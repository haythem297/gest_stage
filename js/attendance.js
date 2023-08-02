$(document).ready(function(){
   $('#btn-save-attendance').on('click',function(){
      var tbl = [];
      $('.chk').each(function(){
          if($(this).is(':checked')){
              tbl.push({id:$(this).data('id'),state:'true'});
          }else{
              tbl.push({id:$(this).data('id'),state:'false'});
          }
      });
      $.ajax({
          url:'/queries/index.php',
          method:'POST',
          dataType:'json',
          data:{data:tbl},
          success:function(response){
              if(response=='ok')
                  window.location.reload();
          }
      });
   });

   jQuery(document).ready(function() {
    var chartDiv = $("#barChart");
    var ouvriers = 0;
    var techniciens = 0;
        $.ajax({
        url:'/queries/stats.php',
        method:'GET',
        dataType:'json',
        success:function(response){
            if(response.msg=='ok'){
                techniciens = parseInt(response.techniciens);
                ouvriers = parseInt(response.ouvriers);
            } 
        }
    });
    setTimeout(function(){
        var myChart = new Chart(chartDiv, {
            type: 'pie',
            data: {
                labels: ["Ouvrier", "Technicien"],
                datasets: [
                {
                    data: [ouvriers,techniciens],
                    backgroundColor: [
                     "#FF6384",
                     "#4BC0C0",
                    
                    ]
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Pie Chart'
                },
                responsive: true,
        maintainAspectRatio: false,
            }
        });
    },1000)
});
});