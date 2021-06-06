<html>

<head>
    <title>Create Post</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container">
        <h2>Lar-Ater (laravel form repeater, with multiple uploads.)</h2>
        <hr />
        <p>Create New Blog</p>
        <a class="btn btn-success my-2" href="javascript:void(0);" id="add_button" title="Add field">TAMBAH FIELD</a>
        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="field_wrapper">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <input class="form-control" placeholder="Title" type="text" name="title[]" value=""/>
                        </div>
                        <div class="col-md-3">
                            <input class="form-control" placeholder="Description" type="text" name="description[]" value=""/>
                        </div>
                        <div class="col-md-6">
                            <input class="form-control" type="file" name="thumbnail[]" value="" />
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-lg btn-primary" type="submit">SIMPAN</a>
                <script type="text/javascript">
                    $(document).ready(function() {
                        var maxField = 10;
                        var addButton = $('#add_button');
                        var wrapper = $('.field_wrapper');
                        var fieldHTML = '<div class="form-group add"><div class="row">';
                        fieldHTML = fieldHTML +
                            '<div class="col-md-3"><input class="form-control" placeholder="Title" type="text" name="title[]" /></div>';
                        fieldHTML = fieldHTML +
                            '<div class="col-md-3"><input class="form-control" placeholder="Description" type="text" name="description[]" /></div>';
                        fieldHTML = fieldHTML +
                            '<div class="col-md-4"><input class="form-control" type="file" name="thumbnail[]" /></div>';
                        fieldHTML = fieldHTML +
                            '<div class="col-md-2"><a href="javascript:void(0);" class="remove_button btn btn-danger">HAPUS</a></div>';
                        fieldHTML = fieldHTML + '</div></div>';
                        var x = 1;
                        $(addButton).click(function() {
                            if (x < maxField) {
                                x++;
                                $(wrapper).append(fieldHTML);
                            }
                        });

                        $(wrapper).on('click', '.remove_button', function(e) {
                            e.preventDefault();
                            $(this).parent('').parent('').remove();
                            x--;
                        });
                    });

                </script>
    </div>
</body>
</form>

</html>
