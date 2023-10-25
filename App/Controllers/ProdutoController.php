<?php

namespace App\Controllers;

use App\Views\MainView;
use App\DTOs\ProdutoDTO;
use App\Models\Repository\ProductRepository;
use App\Models\Repository\ValidaProdutos;

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

        if (isset($_POST['submit']) && !empty($_POST['nome']) && !empty($_POST['preco'])) {

            $files = $_FILES['file'];
            $names = $files['name'];
            $tmp_name = $files['tmp_name'];

            $nome = htmlspecialchars($_POST['nome']);
            $preco = $_POST['preco'];
            $categoria = htmlspecialchars($_POST['categoria']);

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
                $path
            );

            $validaProduto = new  ValidaProdutos($produtoDTO);
            $produto = $validaProduto->execute();
            if ($produto != null) {
                move_uploaded_file($moveOne, $moveTwo);
                $newProduto = new ProductRepository($produto);
                $newProduto->execute();
            } else {
                echo 'Erro ao cadastrar produto!!';
            }
        }
    }
}
