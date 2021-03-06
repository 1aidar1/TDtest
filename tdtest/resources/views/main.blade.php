<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="http://code.jquery.com/jquery-2.0.2.min.js"></script>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div>
    <!-- Main -->
    <div class="main">
        <form action="{{route('fibonacci-out')}}" method="post" autocomplete="off" >
            @csrf
            <h4>Введите порядок числа Фибоначи</h4><br>
            <input type="text" id="input-number" name="input-number" placeholder="ex.3" >
            <button type="submit" class="btn btn-dark" id="btn-ok">OK</button>
        </form>
    </div>
    <!-- Popup -->
    <div class="modal fade" id="popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="popup-answer"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
    $('#btn-ok').click((e)=>{
        e.preventDefault();
        let url = '{{route("fibonacci-out")}}';
        let x = $('#input-number').val();
        let _token = $("input[name=_token]").val();
        let query = {
            input: x,
            _token:_token
        };
        $.post(url, query, function(data) {
            if(parseInt(data[0]) || data[0]==='-' || data[0]==='0')
                $('#popup-answer').html('F('+x+') = ' + data);
            else
                $('#popup-answer').html(data);
            $('#popup').modal('show');
        });
    });
</script>

</body>

</html>
