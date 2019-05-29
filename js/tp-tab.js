$('#phone').blur(function(){
              var reg=/^(18|15|13|14|17)\d{9}/g;
              if (!reg.test($(this).val())) {
                $('.no').show()
               }
               else{
                  $('.no').hide()   
               }
         })
         $('.butt').click(function(){
              if($("#phone").val()=='') {
                alert('请输入手机号');
                return;
              };
            var x=10000
            var y=1000
            var rand=parseInt(Math.random()*(x-y+1)+y)
            $('.butt').val(rand)
           })

           $('.nums').blur(function(){
            if ($('.nums').val()==$('.butt').val()) {
                  $('.yw').hide()
            }else{
             $('.yw').show()
             $('.nums').val('')
            }
        }) 
           $('.denglu').click(function(){
              if ($('.nums').val()==$('.butt').val()) {
                  alert('登录成功')
               }else{
                     alert('登录失败');
                     return
               } 
           })