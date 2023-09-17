<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Document</title>
</head>
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100vh;
    }

    form {
        width: 400px;
    }
</style>

<body>
    <form method="post" action="{{route('admin.access_check')}}">
        @csrf
        <div class="form-outline mb-4">
            <input name='login' type="text" id="form2Example1" class="form-control" />
            @error("login")
            <div class="alert alert-danger mt-2" role="alert">
                {{ $message }}
            </div>
            @enderror
            <label class="form-label" for="form2Example1">login</label>
        </div>

        <div class="form-outline mb-4">
            <input name='password' type="password" id="form2Example2" class="form-control" />
            @error("password")
            <div class="alert alert-danger mt-2" role="alert">
                {{ $message }}
            </div>
            <label class="form-label" for="form2Example2">Password</label>
        </div>



        @enderror
        <div class="row mb-4">
            <!-- <div class="col d-flex justify-content-center">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                    <label class="form-check-label" for="form2Example31"> Remember me </label>
                </div>
            </div> -->


        </div>
        @if(session()->has('message'))
        <div class="alert alert-danger">
            {{ session('message') }}
        </div>
        @endif
        <button type="submit" class="btn btn-primary btn-block mb-4">Daxil ol</button>

    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>

</html>