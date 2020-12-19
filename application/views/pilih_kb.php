<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pilih KB</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>

    </style>
</head>

<body>


    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-light static-top navbar-dark bg-dark">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="navbar-toggler-icon"></span>
                </button> <a class="navbar-brand" href="#">PIL-KB</a>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="navbar/home">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="navbar/pilih_kb">Pilih KB</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="navbar/kritik_saran_admin">Kritik dan Saran</a>
                        </li>

                    </ul>


                </div>

            </nav>
        </div>
    </div>

    <div class="container-fluid" style="background-color: gray;">


        <div class="row" style="padding-top:50px;"></div>

        <div class="row" style="border: 5px solid #999;margin-left: 10px; ;margin-right: 10px; background-color: #4DE1FF;">
            <div class="col-sm-12">
                <div class="page-header" style="padding-bottom:30px;">
                    <form action="<?php echo base_url("main/vote"); ?>" method="post">
                        <br>
                        <h1 class="specialHead" style="color:black">Pilih Calon Ketua Yang Ingin Anda Pilih</h1>
                        <div class="col-sm-12" style="border: 1px solid;">
                            <?php $i = 1 ?>
                            <?php foreach ($posts2 as $post) : ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios<?php echo $i; ?>" value="<?php echo $post->ID_ketua; ?>" checked style="transform: scale(1.5);margin-top: 25px;">
                                    <label class="form-check-label" for="exampleRadios<?php echo $i; ?>" style="font-size: 40px">
                                        <?php echo $post->nama; ?>
                                    </label>
                                </div>

                            <?php
                                $i++;
                            endforeach;
                            ?>
                        </div>
                        <br>
                        <a href="main" class="btn btn-info"type="submit" name="submit"> <strong>Pilih Ketua</strong></a>
                    </form>
                </div>
                <?php
                if (isset($_POST['submit'])) {
                    if (!empty($_POST['exampleRadios'])) {
                        echo '  ' . $_POST['exampleRadios'];
                    } else {
                        echo 'Please select the value.';
                    }
                }
                ?>

            </div>

        </div>


        <div class="row" style="padding-top:50px;"></div>
    </div>


    <script>
        function time() {
            var date = new Date();
            var time = date.toLocaleTimeString();
            var options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            var day = date.toLocaleDateString('en-US', options);
            document.getElementById('time').innerHTML = time;
            document.getElementById('day').innerHTML = day;
        }
        setInterval(function() {
            time();
        }, 1000);
    </script>
    <script type="text/javascript">
        $(function() {
            $('#dtpickerdemo').datetimepicker();
        });
    </script>
    <div class="row" style="padding-top:50px;"></div>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>

</html>