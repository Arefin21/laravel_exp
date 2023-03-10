<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>  
<script>
    $(document).ready(function(){
        $(document).on('click','.add_product',function(e){
            e.preventDefault();
            let name=$('#name').val();
            let price=$('#price').val();

            // console.log(name+price);
            
            $.ajax({
                url:"{{route('add.product')}}",
                method:'post',
                data:{name:name,price:price},
                success:function(res){
                        console.log(res);
                },error:function(err){
                    //console.log(err);
                  let error=err.responseJSON;  
                  $.each(error.erros,function(index,value){
                    $('.errorMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>');
                  });
                }
            });
        })
    });
</script>
