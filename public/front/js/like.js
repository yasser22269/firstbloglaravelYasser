$(document).ready(function(){
    'use strict';

$(".like").click(function(){
    var like_s = $(this).attr('data-like');
    var post_id = $(this).attr('data-postid');
    // alert(post_id);
    post_id = post_id.slice(0,-2);


    // alert(post_id);

    $.ajax({
        type:'POST',
        url:url,
        data:{
            _token : token , like_s : like_s , post_id : post_id

        },

        success: function(data){
            if(data.is_like ==1){
                $('*[data-postid="'+post_id +'_l"]').removeClass('btn-secondary').addClass('btn-success');
                $('*[data-postid="'+post_id +'_d"]').removeClass('btn-danger').addClass('btn-secondary');

                var count_like =  $('*[data-postid="'+post_id +'_l"]').find('.count_like').text();
               var new_like = parseInt(count_like) +1;
                $('*[data-postid="'+post_id +'_l"]').find('.count_like').text(new_like);


                if(data.like_change == 1 ){

                    var count_dislike =  $('*[data-postid="'+post_id +'_d"]').find('.count_dislike').text();
                    var new_dislike = parseInt(count_dislike) - 1;
                     $('*[data-postid="'+post_id +'_d"]').find('.count_dislike').text(new_dislike);
                }
            }


            if(data.is_like ==0){
                $('*[data-postid="'+post_id +'_l"]').removeClass('btn-success').addClass('btn-secondary');


                var count_like =  $('*[data-postid="'+post_id +'_l"]').find('.count_like').text();
                var new_like = parseInt(count_like) - 1;
                 $('*[data-postid="'+post_id +'_l"]').find('.count_like').text(new_like);



            }
        }


    });

  });











  $(".dislike").click(function(){
    var like_s = $(this).attr('data-dislike');
    var post_id = $(this).attr('data-postid');
    // alert(post_id);
    post_id = post_id.slice(0,-2);


    // alert(post_id);

    $.ajax({
        type:'POST',
        url:url_dis,
        data:{
            _token : token , like_s : like_s , post_id : post_id

        },

        success: function(data){
            if(data.is_like ==1){
                $('*[data-postid="'+post_id +'_d"]').removeClass('btn-secondary').addClass('btn-danger');
                $('*[data-postid="'+post_id +'_l"]').removeClass('btn-success').addClass('btn-secondary');


                var count_like =  $('*[data-postid="'+post_id +'_d"]').find('.count_dislike').text();
               var new_like = parseInt(count_like) + 1;
                $('*[data-postid="'+post_id +'_d"]').find('.count_dislike').text(new_like);


                if(data.dislike_change == 1 ){

                    var count_like =  $('*[data-postid="'+post_id +'_l"]').find('.count_like').text();
                    var new_like = parseInt(count_like) - 1;
                     $('*[data-postid="'+post_id +'_l"]').find('.count_like').text(new_like);
                }
            }


            if(data.is_like ==0){
                $('*[data-postid="'+post_id +'_d"]').removeClass('btn-danger').addClass('btn-secondary');

                var count_like =  $('*[data-postid="'+post_id +'_d"]').find('.count_dislike').text();
               var new_like = parseInt(count_like) - 1;
                $('*[data-postid="'+post_id +'_d"]').find('.count_dislike').text(new_like);
            }
        }


    });

  });

});
