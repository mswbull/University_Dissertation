<?php
require "../connect.php";

$query = "select * from club, crew, eventdetails WHERE club.club_id = crew.club_id AND crew.crew_id = eventdetails.crew_id AND eventdetails_result = '2nd' GROUP BY club.club_id";
$result = @mysql_query($query, $connection)
or die ("Unable to perform query<br />$query");

$query1 = "select count(eventdetails_result) AS Wins, club_name from club, crew, eventdetails WHERE club.club_id = crew.club_id AND crew.crew_id = eventdetails.crew_id AND eventdetails_result = '2nd' GROUP BY club.club_id";
$result1 = @mysql_query($query1, $connection)
or die ("Unable to perform query<br />$query1");

echo"<chart>
<!-- change the chart to a bar chart -->
<chart_type>column</chart_type>
<!-- make the chart's border red, 4 pixels thick, except for the top -->
<!--<chart_border top_thickness='0' bottom_thickness='4' left_thickness='4' right_thickness='4' color='FF0000' />-->

<chart_data>
      <row>
        <null/>";

while($row=mysql_fetch_array($result)){

        echo"<string>".$row['club_name']."</string>";
        }

echo"</row>
      <row>
         <string>Wins</string>";
         while($row1=mysql_fetch_array($result1)){

        echo"<number>".$row1['Wins']."</number>";
        }
      echo"</row>
       
   </chart_data>
</chart>";

?>
<!-- chart types
          o Line
          o Column
          o Stacked column
          o Floating column
          o 3D column
          o Stacked 3D column
          o Parallel 3D column
          o Pie
          o 3D Pie
          o Bar
          o Stacked bar
          o Floating bar
          o Area
          o Stacked area
          o Candlestick
          o Scatter
          o Polar
          o Mixed
          o Composite
          o Joined -->

 
