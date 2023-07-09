@extends('admin.app') @section('title') Chi tiết Sản phẩm @endsection
@section('content')

<body>
    <div class="">
        <h3> Chi tiết hình ảnh sản phẩm </h3>

        <h1> {{$id}} </h1>
        <form method="post" action="{{ route('admin.imagezone.upload',$id) }}" enctype="multipart/form-data" class="dropzone" id="dropzone">
            @csrf
        </form>
    </div>
    <h3> Bộ sưu tập hình ảnh </h3>
    <?php
        $rowDetailPhoto = \App\Models\TableProductDetail::where('product_id',$id)->get();
    ?>

    <?php if(count($rowDetailPhoto)>0)  { ?>
        <div class="row">
            <?php foreach ($rowDetailPhoto as $k => $v) { ?>
            <div class="col-3">
                <img class="d-block" src="{{asset("http://localhost:8000/storage/$v->photo")}}" alt="{{$v->name}}" />

            </div>
            <?php } ?>
        </div>
    <?php }  ?>



    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> --}}

    <script type="text/javascript">
        Dropzone.options.dropzone = {
            maxFileSize: 10,
            renameFile: function(file){
                var dt = new Date();
                var time  = dt.getTime();
                return time+file.name;
            },
            acceptedFiles: ".jpeg, .jpg, .png, .gif",
            addRemoveLinks:true,
            timeout: 5000,
            success:function(file,response){
                console.log(response);
            },
            error:function(file,response){
                return false;
            }
        }
    </script>
  </body>

@endsection
