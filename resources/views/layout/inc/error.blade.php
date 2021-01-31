@if($errors->any())
   @foreach ($errors->all() as $error)
                    <script>
                       toastr.warning('{{ $error }}')
                    </script>
    @endforeach
@endif

@if(session()->has('success'))
<script>
    toastr.info("{{ session()->get('success') }}")
 </script>
@endif
