<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Dreamworks Integrated Systems</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

  <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bundles/prism/prism.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bundles/select2/dist/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bundles/jquery-selectric/selectric.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/datatables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/bundles/bootstrap-daterangepicker/daterangepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
  <style>
    #visitorMap {
    height: 500px;
    min-width: 310px;
    max-width: 800px;
    margin: 0 auto;
}

.loading {
    margin-top: 10em;
    text-align: center;
    color: gray;
}

#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modals {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 9999; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}


/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 100%;
  /* height: 500px; */
  max-width: 700px;
}

.btn-close {
  float: right;
  margin-right: 50px;
  margin-bottom: 50px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)}
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)}
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
  </style>
</head>
<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
        @include('includes.nav')
        @include('includes.aside')
        @yield('content')
        @include('includes.footer')
        @include('facility.edit')
    </div>
  </div>


  {{-- <script src="{{asset('assets/libs/select2/js/select2.min.js')}}"></script> --}}
  <script>
    $( '#basic-usage' ).select2( {
     theme: "bootstrap-5",
  });
   </script>
  <!-- General JS Scripts -->
  <script src="{{ asset('assets/js/app.min.js') }}"></script>
  <!-- JS Libraies -->
  <script src="{{ asset('assets/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
  <script src="{{ asset('assets/bundles/prism/prism.js') }}"></script>
  <script src="{{ asset('assets/js/page/advance-table.js') }}"></script>
  <script src="{{ asset('assets/bundles/select2/dist/js/select2.full.min.js') }}"></script>
  <script src="{{ asset('assets/bundles/jquery-selectric/jquery.selectric.min.js') }}"></script>
  <script src="{{ asset('assets/bundles/datatables/datatables.min.js') }}"></script>
  <script src="{{ asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assets/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
  <script src="{{ asset('assets/js/page/datatables.js') }}"></script>
  <script src="{{ asset('assets/bundles/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
  <script src="{{ asset('assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
  <script src="{{ asset('assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>
  <script src="{{ asset('assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
  <script src="{{ asset('assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
  {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
<script>
    $('#summernote').summernote({
      placeholder: 'Compose your message',
      tabsize: 2,
      height: 120,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']]
      ]
    });
  </script>
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <!-- Custom JS File -->
  <script src="{{ asset('assets/js/custom.js') }}"></script>

  <script type="text/javascript">
    function editFunc(id){
     $.ajax({
        type:"GET",
        url: "{{ url('facility-report') }}" + '/' + id +'/'+ 'edit',
        data: {id : id},
        dataType: 'json',
        success: function(res){
            $('#company-modal').modal('show');
            $('#id').val(res.id);
            $('#item_details').val(res.item_details);
            $('#availability').val(res.availability);
            $('#condition').val(res.condition);
            $('#comments').val(res.comments);
        }
        // console.log(res);
     });
    }


    $('#CompanyForm').submit(function(e) {
        e.preventDefault();
        let id           = $("#id").val();
        let item_details = $("#item_details").val();
        let availability = $("#availability").val();
        let condition    = $("#condition").val();
        let comments     = $("#comments").val();
        let _token       = $("input[name=_token]").val();

     $.ajax({
        url: "{{ url('facility-report')}}" + '/' + id,
        type:'PUT',
        data: {
            id:id,
            item_details:item_details,
            availability:availability,
            condition:condition,
            comments:comments,
            _token:_token
        },
        success:function(response){
            $('#rid' + response.id +' td:nth-child(2)').text(response.item_details);
            $('#rid' + response.id +' td:nth-child(3)').text(response.availability);
            $('#rid' + response.id +' td:nth-child(4)').text(response.condition);
            $('#rid' + response.id +' td:nth-child(5)').text(response.comments);
            $("#company-modal").modal('toggle');
            $("#CompanyForm")[0].reset();
        },
            error: function(data){
            console.log(data);
          }
      });
    });
    </script>
</body>
</html>
