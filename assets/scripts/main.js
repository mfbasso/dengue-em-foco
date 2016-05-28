var user = {
  'userName'  : localStorage.getItem('userName'),
  'userEmail' : localStorage.getItem('userEmail'),
  'userPhoto' : localStorage.getItem('userPhoto')
};

$.ajax({
  type: "POST",
  url: "http://localhost/dengue-em-foco/login/oauth",
  dataType: 'json',
  data: {
    'usuario' : JSON.stringify(usuario)
  },
  success: function(data){
    console.log("success" + data);
    window.location.href='http://localhost/dengue-em-foco/pages/view/mapa';
  },
  error: function(XMLHttpRequest, textStatus, errorThrown){
    alert("Erro! " + textStatus + ' ' + errorThrown);
  }
});
