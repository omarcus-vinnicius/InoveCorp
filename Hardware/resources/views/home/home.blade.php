<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <link rel="stylesheet" href="/css/reset.css" />
    <link rel="stylesheet" href="/css/Home/home.css" />
    <link rel="stylesheet" href="/css/home/responsiveHome.css" />
    <title>Home</title>
</head>

<body>
    <main>
        <span class="static_nav_logo">
            <li class="link_logout">
                <form method="POST" class="logout" action="/logout">
                    @csrf
                    <a href="/logout" class="logout">
                        LOGOUT
                    </a>
                </form>
            </li>
            <img src="/image/logo_inov.png" class="img_logo" />
        </span>

        <span class="container_msg">
            @if (session('success'))
                <p class="alert alert-success"> {{session('success')}}</p>
            @endif
            @if (session('error'))
                <p class="alert alert-danger"> {{session('error')}}</p>
            @endif
        </span>

        @if (isset($object) || !empty($object))

            <form action="/home/put/{{$object->id}}" method="POST" id="form_home" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="container_photo_products">
                    <span>
                        <input type="image" src="/imageProducts/{{$object->image}}" alt="loading...." />
                        <input type="file" id="image" name="image" accept="image/png, image/jpeg" />
                    </span>

                    <span class="container_input">
                        <label>Serial number :</label>
                        <input type="text" id="input_serial_number" value="{{$object->serial_number}}" name="serial_number"
                            class="input_text" />
                    </span>
                </div>

                <div class="container_input_produtcs">
                    <span class="container_input">
                        <label>Mark :</label>
                        <input type="text" id="input_mark" value="{{$object->mark}}" name="mark" class="input_text" />
                    </span>

                    <span class="container_input">
                        <label>Model :</label>
                        <input type="text" id="input_model" name="model_product" value="{{$object->model_product}}"
                            class="input_text" />
                    </span>

                    <span class="container_input">
                        <label>Description :</label>
                        <input type="text" id="input_description" name="description" value="{{$object->description}}"
                            class="input_text" />
                    </span>
                    <input type="submit" id="send_update" class="send_product" value="Update" />
                </div>
            </form>

        @else

            <form action="/home" method="POST" id="form_home" enctype="multipart/form-data">
                @csrf

                <div class="container_photo_products">
                    <span>
                        <input type="image" src="/image/image-example.jpg" alt="loading...." />
                        <input type="file" id="image" name="image" accept="image/png, image/jpeg" />
                    </span>

                    <span class="container_input">
                        <label>Serial number :</label>
                        <input type="text" id="input_serial_number" name="serial_number" class="input_text" />
                    </span>
                </div>

                <div class="container_input_produtcs">
                    <span class="container_input">
                        <label>Mark :</label>
                        <input type="text" id="input_mark" name="mark" class="input_text" />
                    </span>

                    <span class="container_input">
                        <label>Model :</label>
                        <input type="text" id="input_model" name="model" class="input_text" />
                    </span>

                    <span class="container_input">
                        <label>Description :</label>
                        <input type="text" id="input_description" name="description" class="input_text" />
                    </span>
                    <input type="submit" id="send_product" class="send_product" value="Send" />
                </div>
            </form>

        @endif


        <div class="container_search">
            <span class="container_input">
                <label>Search :</label>
                <input type="text" id="input_search" name="search" class="input_text" placeholder="search..." />
            </span>
        </div>

        <div class="container_table">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Mark</th>
                        <th scope="col">Model</th>
                        <th scope="col">Description</th>
                        <th scope="col">Serial number</th>
                        <th scope="col">Image</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{$product->mark}}</td>
                            <td>{{$product->model_product}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->serial_number}}</td>
                            <td>
                                <img src="/imageProducts/{{$product->image}}" class="img_table" />
                            </td>
                            <td>
                                <a href="/home/edit/{{ $product->id }}" class="btn btn-primary">
                                    UPDATE
                                </a>
                                <br>
                                <form action="/home/{{ $product->id }}" method="POST" class="button_table">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

    <footer>
        <p>Marcus Vinncius &copy; 2024</p>
    </footer>
</body>

</html>