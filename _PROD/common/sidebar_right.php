<?php
// echo "
// <div class='3u'>
//     <section id='sidebar2'>
//         <header>
//             <h2>Upcoming Games</h2>
//         </header>
//         <!--
//         <ul class='style1'>
//             <li class='first'><span class='fa fa-check'></span><a href='#'>Maecenas luctus lectus at sapien</a></li>
//             <li><span class='fa fa-check'></span><a href='#'>Etiam rhoncus volutpat erat</a></li>
//         </ul>
//         -->

//         <table id='upcoming_games'>
//             <tr><td class='divider' colspan=2><hr /></td></tr>
//                 <tr><td><em>9/13<em></td><td><em>6:45PM<em></td></tr>
//                 <tr><td class='team' colspan=2>Red Alert and Flying Moose</td>
//             </tr>
//             <tr><td class='divider' colspan=2><hr /></td></tr>
//                 <tr><td><em>9/13<em></td><td><em>8:05PM<em></td></tr>
//                 <tr><td class='team' colspan=2>Kryptonite and Ichi Bike</td>
//             </tr>
//             <tr><td class='divider' colspan=2><hr /></td></tr>
//                 <tr><td><em>9/13<em></td><td><em>9:25PM<em></td></tr>
//                 <tr><td class='team' colspan=2>Blades of Steel and Alien Hockey</td>
//             </tr>
//             <tr><td class='divider' colspan=2><hr /></td></tr>
//                 <tr><td><em>9/13<em></td><td><em>10:45PM<em></td></tr>
//                 <tr><td class='team' colspan=2>Guru BBQ and Rink Rats</td>
//                 <tr><td class='divider' colspan=2><hr /></td></tr>
//             </tr>
//         </table>
//         <a href='schedule.php' class='button'>Full Schedule</a>
//     </section>
// </div>
// ";

    echo "
        <div class='3u'>
        <section id='sidebar2'>
    <table id='upcoming_games'>";
    include ("common/db_setup.php");
	$query = "SELECT date_format(sched.date,'%c/%e') as 'date',
				time_format(sched.time,'%h:%i %p') as 'time',
				team1.name as 'home',
				team2.name as 'away'
			from schedule sched
			join team team1 
				on sched.home = team1.id
			join team team2
				on sched.away = team2.id
		where team1.season = 9 
            and team2.season = 9
            and sched.date > CURDATE()
        order by sched.date, sched.time
        limit 4";
	$result = mysqli_query($connection, $query) or die("Query failed");
	while ($row = mysqli_fetch_assoc($result)) {
		$date = $row['date'];
		$time = $row['time'];
		$home = $row['home'];
		$away = $row['away'];
        echo "<tr><td><em>"
        echo htmlentities($date);
        echo "<em></td><td><em>";
        echo htmlentities($time>);
        echo "<em></td></tr>";
        echo "<tr><td class='team' colspan=2>";
        echo htmlentities($home);
        echo " vs. ";
        echo htmlentities($away);
        echo "</td><tr><td class='divider' colspan=2><hr /></td></tr>";
    }
	mysqli_free_result($result);
	mysqli_close($connection);
    echo "</table>
            <a href='schedule.php' class='button'>Full Schedule</a>
        </section>
    </div>";
?>

