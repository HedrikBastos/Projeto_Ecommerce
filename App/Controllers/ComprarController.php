<?php

namespace App\Controllers;

use App\Models\Repository\ProductRepository;
use App\Models\Checkout\PagSeguro;
use App\Models\Repository\UserRepository;
use App\Models\Repository\EnderecoRepository;
use App\Models\Checkout\Key;
use App\Views\MainView;

class ComprarController
{
    public function index($parameter = null)
    {

        if (isset($_SESSION['login'])) {

            $produtos = ProductRepository::selectProdutos();
            $enderecoRepository = new EnderecoRepository();
            $endereco = $enderecoRepository->buscaEndereco($_SESSION['id_usuario']);
            $keyController = Key::getPublicKey();

            if ($parameter == null) {

                $carrinho = $_SESSION['carrinho'] ?? "";
                /*
                if (isset($_POST['pagar'])) {
                    $encrypted =  $_POST['encryptedCard'];
                    $keyController = Key::getPublicKey();
                    $enderecoRepository = new EnderecoRepository();
                    $userRepository = new UserRepository();
                    $checkoutCredito = new PagSeguro($userRepository, $enderecoRepository, $carrinho, $encrypted);
                    $creditoResponse = $checkoutCredito->credito();
                    $arrayResponse = json_decode($creditoResponse, true);
                }
                */
                if (isset($_POST['submit'])) {

                    if (empty($carrinho)) {
                        MainView::renderizar('comprar', ['parameter' => $parameter, 'endereco' => $endereco, 'key' => $keyController ?? ""]);
                        die();
                    }

                    switch ($_POST['method']) {

                        case 'boleto':

                            $enderecoRepository = new EnderecoRepository();
                            $userRepository = new UserRepository();
                            $checkoutBoleto = new PagSeguro($userRepository, $enderecoRepository, $carrinho);
                            $boletoResponse = $checkoutBoleto->boleto();
                            $arrayResponse = json_decode($boletoResponse, true);
                            break;

                        case 'pix':

                            $enderecoRepository = new EnderecoRepository();
                            $userRepository = new UserRepository();
                            $checkoutPix = new PagSeguro($userRepository, $enderecoRepository, $carrinho);
                            $pixResponse = $checkoutPix->pix();
                            $arrayResponse = json_decode($pixResponse, true);
                            break;

                        default:

                            break;
                    }
                }

                if (isset($_GET['pdf_url'])) {
                    $pdf_url = $_GET['pdf_url'];

                    // Remove espaços em branco ou qualquer output antes dos headers
                    ob_clean();

                    // Configura os headers para o download
                    header('Content-Type: application/pdf');
                    header('Content-Disposition: attachment; filename="' . basename($pdf_url) . '"');

                    // Lê e imprime o conteúdo do arquivo PDF diretamente da URL
                    readfile($pdf_url);
                    exit;
                }
                MainView::renderizar('comprar', ['parameter' => $parameter, 'arrayResponse' => $arrayResponse ?? "", 'endereco' => $endereco, 'carrinho' => $carrinho, 'key' => $keyController ?? ""]);
            } else {

                $produto = ProductRepository::selectProdutoEspecifico($parameter);
                /*
                if (isset($_POST['pagar'])) {
                    echo 'asdsadas';
                    $encrypted =  $_POST['encryptedCard'];
                    echo $encrypted;
                    $keyController = Key::getPublicKey();
                    $enderecoRepository = new EnderecoRepository();
                    $userRepository = new UserRepository();
                    $checkoutCredito = new PagSeguro($userRepository, $enderecoRepository, $produto, $encrypted);
                    $creditoResponse = $checkoutCredito->credito();
                    $arrayResponse = json_decode($creditoResponse, true);
                }
                */
                if (isset($_POST['submit'])) {

                    switch ($_POST['method']) {

                        case 'boleto':
                            $enderecoRepository = new EnderecoRepository();
                            $userRepository = new UserRepository();
                            $checkoutBoleto = new PagSeguro($userRepository, $enderecoRepository, $produto);
                            $boletoResponse = $checkoutBoleto->boleto();
                            $arrayResponse = json_decode($boletoResponse, true);
                            break;

                        case 'pix':

                            $enderecoRepository = new EnderecoRepository();
                            $userRepository = new UserRepository();
                            $checkoutPix = new PagSeguro($userRepository, $enderecoRepository, $produto);
                            $pixResponse = $checkoutPix->pix();
                            $arrayResponse = json_decode($pixResponse, true);
                            break;

                        default:

                            break;
                    }
                }

                if (isset($_GET['pdf_url'])) {
                    $pdf_url = $_GET['pdf_url'];

                    // Remove espaços em branco ou qualquer output antes dos headers
                    ob_clean();

                    // Configura os headers para o download
                    header('Content-Type: application/pdf');
                    header('Content-Disposition: attachment; filename="' . basename($pdf_url) . '"');

                    // Lê e imprime o conteúdo do arquivo PDF diretamente da URL
                    readfile($pdf_url);
                    exit;
                }

                MainView::renderizar('comprar', ['parameter' => $parameter, 'produto' => $produto, 'arrayResponse' => $arrayResponse ?? "", 'endereco' => $endereco, 'key' => $keyController ?? ""]);
            }
        } else {
            unset($_SESSION['login']);
            MainView::renderizar('login');
        }
    }
}
