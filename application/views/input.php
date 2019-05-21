<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- js -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <!-- <script src="<?=base_url()?>; ; assets/js/jquery-2.2.3.min.js"></script>  -->
    <script src="<?=base_url()?>assets/ckeditor/ckeditor.js"></script>
    <title>Nhập dữ liệu</title>
</head>

<body>
    <!-- Submitted March 7 @ 11:05pm  -->
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="https://cdn1.iconfinder.com/data/icons/softwaredemo/PNG/256x256/Pencil3.png"
                    class="img-responsive center-block" alt="">
            </div>
            <!--.col -->
            <div class="col-md-8">
                <h3>
                    Nhập dữ liệu .
                </h3>
                <!-- NOTE: TB3 form width default is 100%, so they expan to your <div> -->
                <form action="/add" name="frmComment" id="frmComment" method="post">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Tỉnh /Thành phố</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="tp">
                        <?php foreach ($allTP as $key => $value) { ?>
                            <option value="<?= $value['matp']?>"><?= $value['name']?></option>
                       <?php } ?>
                        </select>
                    </div>
                    <textarea id="editor" name="editor" class="form-control" rows="3"> </textarea>
                    <hr>
                    <input type="submit" class="btn btn-primary" value="Lưu">
                </form>
       
            </div>
            <!--.col -->
        </div>
        <!--./row -->
    </div>
    <!--./container -->
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor');
    </script>
</body>

</html>