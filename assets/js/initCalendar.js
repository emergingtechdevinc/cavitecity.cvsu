
var subjectschedule =[];


const defaultdate = '2020-05-04';
var eventlist = [];


function getDate(d){
    const day = ['S','M','T','W','TH','F','SAT'];
    var defdate = new Date(defaultdate);
    
    var dayindex =0;
    for(var i = 0;i<day.length;i++){
        if(day[i] == d){
            dayindex = i;
        }
    }
    var datediff = dayindex - defdate.getDay();
    var res = defaultdate.split("-");
    var newdate = res[0]+"-"+res[1]+"-0"+(Number(res[2])+datediff);
    return newdate;
}




function formatevents(subjectschedule){
    
   
    subjectschedule.forEach(sched =>{
        
        
        sched.schedules.forEach(sc =>{
            
            var e ={
                
                title:sched.title+"\n"+sc.room,
                allday:false,
                color: sched.color,
                textColor:"White",
                start:getDate(sc.day)+"T"+sc.start,
                end:getDate(sc.day)+"T"+sc.end
                
            };
            eventlist.push(e);

        
            
        });
    });
}





$(document).ready(function(){

    var loadschedurl = $('#loadschedule').val();
    var schoolyear = $('#schoolyear').val();
    var semester = $('#semester').val();
    var studentid = $('#studentid').val();

    console.log(loadschedurl);
    console.log(schoolyear);
    console.log(semester);
    console.log(studentid);

    $.ajax({
        type: "POST",
        url  : loadschedurl,
        dataType : "JSON",
        data : {schoolyear1:schoolyear, semester1:semester, studentid1:studentid},
        success: function(data){
            console.log(data);
            subjectschedule = data ;
            formatevents(subjectschedule);

            $('#calendarsched').fullCalendar({
                
                header: false,
                defaultDate: '2020-05-04',
                columnFormat: 'dddd',
                allDaySlot: false,
                textColor: "#D0CFCF",
                hiddenDays: [0],
                defaultView: 'agendaWeek',
                minTime:'07:00:00',
                maxTime:'20:00:00',

                editatble: true,
                slotLabelFormat:'h:mm a',
                events:eventlist

          });
      
        }
    });


});