//Συνάρτηση που επιστρέφει ως συμβολοσειρά την τωρινή ημερομηνία
function GetClock()
{
  d = new Date();
  nday   = d.getDay();
  nmonth = d.getMonth();
  ndate  = d.getDate();
  nyear = d.getYear();
  nhour  = d.getHours();
  nmin   = d.getMinutes();
  if(nyear<1000) 
    nyear=nyear+1900;

  if(nmin <= 9)
    nmin="0"+nmin

  return ""+ndate+"/"+(nmonth+1)+"/"+nyear+" "+nhour+":"+nmin+"";
}

