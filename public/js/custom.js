//list my likes
var getUserLike = function(id,questions_id){
  var result;
  $.ajax({
    type: "POST",
    url:"/user_like",
    data:{
      id: id
    },
    success:function(response){
      $('.body-'+questions_id).append('<div><a href="/profile/'+response.id+'">'+ response.first_name +'</a></div>');
    }
  });
  // return result;
  console.log(result);
};
var likes = function(questions_id){
  $('.body-'+questions_id).empty();
  $.ajax({
    type: "POST",
    url:"/questionLikes",
    data:{
      questions_id: questions_id
    },
    success:function(response){
      $('#question-'+questions_id).empty().append(response.qtd);
      var mycontent = [];
      for(i=0;i<response.user.length;i++){
        getUserLike(response.user[i].user_id,questions_id);
      }
    }
  });
};
// do like
var like = function(user_id,questions_id){
  $.ajax({
    type: "POST",
    url:"/doLike",
    data:{
      user_id: user_id,
      questions_id: questions_id
    },
    success:function(response){
      likes(questions_id);
    }
  });
};

$(document).ready(function() {
  // var showComment=function(id){
  //   $(id).removeClass('hidden').show(900);
  //   console.log($(id).show());
  // };
    $('#comm-btn').click(function(){
      $('.toggleable').toggle();
      // $(this).siblings(".hideable").toggleClass('hidden');
      // if($(this).hasClass('hidden')){
      //   $(this).removeClass('hidden');
      // }else{
      //   $(this).addClass('hidden');
      // }
    
      console.log('ok');
    });
});
