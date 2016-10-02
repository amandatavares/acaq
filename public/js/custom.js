//list my likes
var likes = function(questions_id){
  $.ajax({
    type: "POST",
    url:"/questionLikes",
    data:{
      questions_id: questions_id
    },
    success:function(response){
      console.log(response.other);
      $('#question-'+questions_id).empty().append(response.qtd);
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
      console.log(response);
      likes(questions_id);
    }
  });
};
