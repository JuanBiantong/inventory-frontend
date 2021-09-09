<?php
$api_url = 'https://inventory-node.herokuapp.com/api/product';
$json_data = file_get_contents($api_url);


$response_data = json_decode($json_data)->products;


foreach ($response_data as $key => $products) {
    $imgType = $products->productImage->contentType;
    $imgData = $products->productImage->data;
    // $data = new stdClass();
    // $data->id = $products->_id;
    // $data->productName = $products->productName;
    // $data->purchasePrice = $products->purchasePrice;
    // $data->sellingPrice = $products->sellingPrice;
    // $data->stock = $products->stock;

    // var_dump($data);
}
function rupiah($angka)
{
    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.87.0">
    <title>Barang</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
    </style>

    <!-- Custom styles for this template -->
    <link href="../styles/product.css" rel="stylesheet">


</head>

<body>

    <header class="">
        <nav class="navbar navbar-light bg-light d-flex justify-content-around flex-nowrap">
            <div class="container-fluid">
                <a class="navbar-brand">Logo</a>
                <form class="d-flex">
                    <button class="btn btn-outline-success" onclick="logout(event)">Log Out</button>
                </form>
            </div>
        </nav>
    </header>
    <main>
        <section class="py-2 text-center container">
            <div class="row">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <p class="lead text-muted">Something short and leading about the collection below—its contents.</p>
                    <p>
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search" id="myInput">
                    </p>
                </div>
            </div>
        </section>
        <div class="album bg-light">
            <div class="container">
                <div class="container-fluid bg-trasparent my-4 p-3" style="position: relative;">
                    <div class="d-flex justify-content-end pb-2 mb-3 ">
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#productModal">Tambah Barang</button>
                    </div>

                    <!-- modal -->
                    <div class="modal fade " id="productModal" tabindex="-1" role="dialog"
                        aria-labelledby="productModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="productModalLabel">Tambah Barang</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div id="form" class="result modal-body p-4">
                                    <form method="post" id="add-product" action="">
                                        <div class="form-group row mb-3">
                                            <label for="product-name" class="col-sm-4 col-form-label">Nama
                                                Barang</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control required error"
                                                    id="product-name">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-row d-flex justify-content-between mb-3">
                                            <div class="form-group col-md-5">
                                                <label for="purchase-price">Harga Beli</label>
                                                <input type="number" class="form-control" id="purchase-price"
                                                    placeholder="Haga Beli">
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="selling-price">Harga Jual</label>
                                                <input type="number" class="form-control" id="selling-price"
                                                    placeholder="Harga Jual">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row mb-3">
                                            <label for="stock" class="col-sm-4 col-form-label">
                                                Stok</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" id="stock" placeholder="Stok">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group d-flex justify-content-between">
                                            <label for="image">Foto Barang</label>
                                            <input type="file" name="image" id="image">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" onclick="addProduct(event)" class="btn btn-primary">Tambah
                                        Barang</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade " id="updateModal" tabindex="-1" role="dialog"
                        aria-labelledby="productModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="productModalLabel">Update Barang</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div id="form" class="result modal-body p-4">
                                    <form method="post" id="add-product" action="">
                                        <div class="form-group row mb-3">
                                            <label for="update-name" class="col-sm-4 col-form-label">Nama
                                                Barang</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control required error" id="update-name">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-row d-flex justify-content-between mb-3">
                                            <div class="form-group col-md-5">
                                                <label for="update-purchase">Harga Beli</label>
                                                <input type="number" class="form-control" id="update-purchase"
                                                    placeholder="Haga Beli">
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="update-selling">Harga Jual</label>
                                                <input type="number" class="form-control" id="update-selling"
                                                    placeholder="Harga Jual">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row mb-3">
                                            <label for="update-stock" class="col-sm-4 col-form-label">
                                                Stok</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" id="update-stock"
                                                    placeholder="Stok">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group d-flex justify-content-between">
                                            <label for="update-image">Foto Barang</label>
                                            <input type="file" name="update-image" id="update-image">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" onclick="update(event)" class="btn btn-primary">Update
                                        Barang</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end of modal -->

                    <div class="row">
                        <table class="row d-flex justify-content-around">
                            <tbody id="myTable2">
                                <?php foreach ($response_data as $key => $products) : ?>
                                <tr>
                                    <div class="col-md-4 col-sm-6 g-3">
                                        <div class="card"> <img
                                                src="data:<? $imgType ?>;base64,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"
                                                class="card-img-top" alt="" />
                                            <div class="card-body">
                                                <h4 class="p-1 rounded product-name"><?= $products->productName; ?></h4>
                                                <div class="clearfix mb-2"> <span
                                                        class="float-start bg-secondary rounded p-1">Harga
                                                        Beli</span>
                                                    <span
                                                        class="float-end"><?= rupiah($products->purchasePrice); ?></span>
                                                </div>
                                                <div class="clearfix mb-2"> <span
                                                        class="float-start bg-secondary rounded p-1">Harga
                                                        Jual</span>
                                                    <span
                                                        class="float-end"><?= rupiah($products->sellingPrice); ?></span>
                                                </div>
                                                <div class="clearfix mb-2"> <span
                                                        class="float-start rounded bg-secondary p-1">Stok</span>
                                                    <span class="float-end"><?= $products->stock; ?></span>
                                                </div>
                                                <div class="d-flex justify-content-around">
                                                    <button class="btn btn-info rounded" data-toggle="modal"
                                                        data-target="#updateModal"
                                                        onclick="updateProduct('<?= $products->_id; ?>')">Update</button>
                                                    <button class="btn btn-danger rounded" type="submit"
                                                        onclick="deleteProduct('<?= $products->_id; ?>')">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        </div>
    </main>

    <footer class=" text-muted py-5">
        <div class="container">
            <p class="float-end mb-1">
                <a href="#">Back to top</a>
            </p>
            <p class="mb-1">Album product is &copy; Bootstrap, but please download and customize it for yourself!
            </p>
            <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a
                    href="../getting-started/introduction/">getting started guide</a>.</p>
        </div>
    </footer>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
    <script type="text/javascript">
    $("#myInput").on("keyup", function() {
        let value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
            return $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });

    function addProduct(event) {
        // Stop form from submitting normally
        event.preventDefault();
        let file = document.getElementById("image").files[0];
        let dataSet = new FormData();
        dataSet.append('productName', $('#product-name').val());
        dataSet.append('purchasePrice', $('#purchase-price').val());
        dataSet.append('sellingPrice', $('#selling-price').val());
        dataSet.append('stock', $('#stock').val());
        dataSet.append('productImage', file);

        let token = localStorage.getItem("token");

        $.ajax({
            contentType: false,
            processData: false,

            url: 'https://inventory-node.herokuapp.com/api/product/create',
            type: 'POST',
            beforeSend: function(xhr) {
                /* Authorization header */
                xhr.setRequestHeader("Authorization", "Bearer " + token);
                xhr.setRequestHeader("x-auth-token", token);
            },
            data: dataSet,
            success: function(dataSet, textStatus, jqXHR) {
                Swal.fire({
                    title: jqXHR.responseJSON,
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.reload()
                })
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire(jqXHR.responseJSON.error);
            }
        });

    }

    function deleteProduct(id) {
        $.ajax({
            url: `https://inventory-node.herokuapp.com/api/product/${id}`,
            type: 'DELETE',
            success: function(result) {
                Swal.fire({
                    title: result.message,
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.reload()
                })
            },
            error: function(result) {
                Swal.fire(resulterror);
            }
        });
    }

    function updateProduct(id) {
        $.ajax({
            url: `https://inventory-node.herokuapp.com/api/product/${id}`,
            type: 'GET',
            success: function(result) {
                document.getElementById("update-name").value = result.productName;
                document.getElementById("update-name").disabled = true;
                document.getElementById("update-purchase").value = result.purchasePrice;
                document.getElementById("update-selling").value = result.sellingPrice;
                document.getElementById("update-stock").value = result.stock;
                localStorage.setItem('productId', result._id)
            },
            error: function(result) {
                Swal.fire(resulterror);
            }
        });
    }

    function update(event) {
        let id = localStorage.getItem("productId");
        //Stop form from submitting normally
        event.preventDefault();
        let file = document.getElementById("update-image").files[0];
        let dataSet = new FormData();
        dataSet.append('productName', $('#update-name').val());
        dataSet.append('purchasePrice', $('#update-purchase').val());
        dataSet.append('sellingPrice', $('#update-selling').val());
        dataSet.append('stock', $('#update-stock').val());
        dataSet.append('productImage', file);

        let token = localStorage.getItem("token");
        $.ajax({
            contentType: false,
            processData: false,

            url: `https://inventory-node.herokuapp.com/api/product/update/${id}`,
            type: 'PATCH',
            beforeSend: function(xhr) {
                /* Authorization header */
                xhr.setRequestHeader("Authorization", "Bearer " + token);
                xhr.setRequestHeader("x-auth-token", token);
            },
            data: dataSet,
            success: function(dataSet, textStatus, jqXHR) {
                Swal.fire({
                    title: jqXHR.responseJSON,
                    confirmButtonText: 'OK'
                }).then(() => {
                    localStorage.removeItem('productId')
                    window.location.reload()
                })
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire(jqXHR.responseJSON.error);
            }
        });
    }

    function logout() {
        event.preventDefault();
        localStorage.clear();
        window.location.replace("../index.php");
    }
    </script>


</body>

</html>