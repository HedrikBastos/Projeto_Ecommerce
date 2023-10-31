<?php

namespace App\Controllers;

use App\Views\MainView;
use App\DTOs\ProdutoDTO;
use App\Models\Repository\ProductRepository;
use App\Models\Service\ValidaProdutos;

class ProdutoController
{
    //implementar um verificação se o admin está logado
    public function index()
    {
        /*
        if ($_SESSION['login'] === 'admin' ) {
            # code...
        }
        */

        MainView::renderizar('produto');

        if (isset($_POST['cadastrar']) && !empty($_POST['nome']) && !empty($_POST['preco']) && !empty($_POST['categoria']) && !empty($_POST['descricao']) && !empty($_FILES['file']) && !empty($_POST['estoque'])) {


            $files = $_FILES['file'];
            $names = $files['name'];
            $tmp_name = $files['tmp_name'];

            $nome = htmlspecialchars($_POST['nome']);
            $preco = $_POST['preco'];
            $categoria = htmlspecialchars($_POST['categoria']);
            $descricao = htmlspecialchars($_POST['descricao']);
            $estoque = $_POST['estoque'];

            foreach ($names as $key => $name) {
                $extension = pathinfo($name, PATHINFO_EXTENSION);
                $newName = uniqid() . '.' . $extension;

                $moveOne = $tmp_name[$key];
                $moveTwo =  __DIR__ . '/../../App/assets/img/produtos/' . $newName;

                $path = 'img/produtos/' . $newName;
            }

            $produtoDTO = new ProdutoDTO(
                $nome,
                $preco,
                $categoria,
                $descricao,
                $estoque,
                $path
            );

            $validaProduto = new  ValidaProdutos($produtoDTO);
            $produto = $validaProduto->validaNovoProduto();
            if ($produto != null) {
                move_uploaded_file($moveOne, $moveTwo);
                $newProduto = new ProductRepository($produto);
                $newProduto->insertProduto();
            } else {
                echo 'Erro ao cadastrar produto!!';
            }
        } elseif (isset($_POST['atualiza'])  && !empty($_POST['nome']) && !empty($_POST['estoque'])) {

            $nome = htmlspecialchars($_POST['nome']);
            $estoque = $_POST['estoque'];

            $produtoDTO = new ProdutoDTO(
                $nome,
                0,
                '',
                '',
                $estoque,
                ''
            );


            $validaProduto = new ValidaProdutos($produtoDTO);
            $produto = $validaProduto->validaNovoEstoque();

            if ($produto != null) {
                $newEstoque = new ProductRepository($produto);
                $newEstoque->insertEstoque();
            } else {
                echo 'Erro ao cadastrar produto!!';
            }
        }
    }
}
