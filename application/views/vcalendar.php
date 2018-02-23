<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='<?= base_url()?>assets/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
<link href='<?= base_url()?>assets/fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='<?= base_url()?>assets/fullcalendar/lib/moment.min.js'></script>
<script src='<?= base_url()?>assets/fullcalendar/lib/jquery.min.js'></script>
<script src='<?= base_url()?>assets/fullcalendar/fullcalendar.min.js'></script>
<script>

  $(document).ready(function() {

    //pass my data
    $.post('<?= base_url()?>ccalendar/getEvents', function(data){
        console.log(data);

        $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,basicWeek,basicDay'
          },
          defaultDate: new Date(),
          navLinks: true, // can click day/week names to navigate views
          editable: true,
          eventLimit: true, // allow "more" link when too many events
          events: $.parseJSON(data),
          eventDrop: function(event, delta, revertFunc){
            //check changes
            let id = event.id;
            let start = event.start.format();
            let end = event.end.format();
            

            //update room
            $.post("<?= base_url()?>ccalendar/updateEvent" ,
                {
                    id:id,
                    start:start,
                    end:end

                },function(data){
                    if (data == 0) {
                        alert('Actualizado correctamente');
                    }
                });
          }
        });
    });


  });

</script>
<style>

  body {
    margin: 40px 10px;
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }

</style>
</head>
<body>

  <div id='calendar'></div>

</body>
</html>
