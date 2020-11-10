<?php
    //deman a get parameter
    if ( ! isset($_GET['name']) || strlen($_GET['name']) <1){
        die('Name parameter missing');
    }

    //if the user requested logout go back to index.php
    if ( isset($_POST['logout'])){
        header('Location: index.php');
        return;
    }

    //set up the value for the game
    // 0 is rock, 1 is paper, and 2 is scissors

    $names = array('Rock', 'Paper', 'Scissors');
    $human = isset($_POST["human"]) ? $_POST['human'] +0 : -1;

    $computer= rand(0,2); // Make computer be random

    //function takes as its input the computer and human choose
    function check($computer, $human){
        if ($human == 0 && $computer == 0){
            return "Tie";
        } else if ($human == 0 && $computer == 1){
            return "Your Lose";
        } else if ($human == 0 && $computer == 2){
            return "Your Win";
        } 
        else if ($human == 1 && $computer == 0){
            return "Your Win";
        } 
        else if ($human == 1 && $computer == 1){
            return "Tie";
        } 
        else if ($human == 1 && $computer == 2){
            return "Your Lose";
        } 
        else if ($human == 2 && $computer == 0){
            return "Your Lose";
        } 
        else if ($human == 2 && $computer == 1){
            return "You Lose";
        } 
        else if ($human == 2 && $computer == 2){
            return "Tie";
        } 
        return false;
    }
    //check to see how the play happenned
    $result = check($computer, $human);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Atmaji Setya P Rock, Paper, Scissor Game</title>
</head>
<body>
    <div class="container">
        <h1>Rock Paper Scissors</h1>
        <?php
            if ( isset($_REQUEST['name'])){
                echo "<p>Welcome: ";
                echo htmlentities($_REQUEST['name']);
                echo "</p>\n";
            }

        ?>
        <form method="post">
            <select name="human">
                <option value="-1">Select</option>
                <option value="0">Rock</option>
                <option value="1">Paper</option>
                <option value="2">Scissors</option>
                <option value="3">Test</option>
            </select>
            <input type="submit" value="Play">
            <input type="submit" name="logout" value="logout">
        </form>

        <pre>
            <?php
                if( $human == -1){
                    print "Please select a strategy and press Play.\n";
                } else if ($human == 3){
                    for ($c=0; $c<3; $c++){
                        for ($h=0; $h<3; $h++){
                            $r = check($c, $h);
                            print "Human=$names[$h] Computer=$names[$c] Result=$r\n";
                        }
                    }
                } else {
                    print "Your Play=$names[$human] Computer Play=$names[$computer] Result=$result\n";
                }
            ?>
        </pre>
    </div>
</body> 
</html>