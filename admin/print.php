<?php include 'includes/session.php'; ?>
<?php include 'includes/slugify.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="">

      <ol class="breadcrumb" style="color:black ; font-size: 17px; font-family:Times">
        <li><a href="home.php"><i class="fa fa-dashboard" ></i> Home</a></li>
        <li class="active" style="color:black ; font-size: 17px; font-family:Times" >Dashboard</li>
      </ol>

      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>



<div class="results_wrapper">

<div>
<button class="btn btn-success btn-sm btn-curve" style="background-color: #2E8B57 ;color:black ; font-size: 12px; font-family:Times " id="download"><span class="glyphicon glyphicon-print"></span> Download</button>
</div>

<div class="results_content" id='results'>
          <div class=''>
            <table>
                <tr>
                    <td>No. of Positions</td>
                    <td>
                        <?php
                            $sql = "SELECT * FROM positions";
                            $query = $conn->query($sql);
                            echo $query->num_rows;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>No. of Candidates</td>
                    <td>
                        <?php
                            $sql = "SELECT * FROM candidates";
                            $query = $conn->query($sql);
                            echo $query->num_rows;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Total Voters</td>
                    <td>
                        <?php
                            $sql = "SELECT * FROM voters";
                            $query = $conn->query($sql);
                            echo $query->num_rows;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Voters Voted</td>
                    <td>
                        <?php
                            $sql = "SELECT * FROM votes GROUP BY voters_id";
                            $query = $conn->query($sql);
                            echo $query->num_rows;
                        ?>
                    </td>
                </tr>
            </table>
          </div>

            <div class='result_tables'>

            
              <?php
                    $sql = "SELECT * FROM positions ORDER BY priority ASC";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                        $sql = "SELECT * FROM candidates WHERE position_id = '".$row['id']."'";
                        $cquery = $conn->query($sql);
                        $carray = array();
                        $varray = array();
                        while($crow = $cquery->fetch_assoc()){
                        array_push($carray, $crow['lastname'].' '.$crow['firstname']);
                        $sql = "SELECT * FROM votes WHERE candidate_id = '".$crow['id']."'";
                        $vquery = $conn->query($sql);
                        array_push($varray, $vquery->num_rows);
                        }

                        echo "
                        <div>
                        <p class='description'>".$row['description']."<p>
                        <table class='result_table'>
                            <tr>
                                <th>Candidate</th>
                                <th>Number of Vote</th>
                            </tr>";
                        for ($len = 0; $len <= sizeof($carray)-1; $len++) {
                                echo"
                                <tr>
                                    <td>".$carray[$len]."</td>
                                    <td>".$varray[$len]."</td>
                                </tr>";
                              };
                        echo"
                        <table>
                        </div>
                        "
                ?>
                </div>
    
    <?php
  }
?>
</div>
</div>
</div>





<style>
    *{
        margin:0;
        padding:0;
        outline:0;
    }

    body{
        /* text-align:center; */
    }
    .results_wrapper{
        display:flex;
        justify-content:center;
        flex-direction:column;
        align-items:center;
    }
    
    .results_content{
        display:flex;
        justify-content:center;
        flex-direction:column;
        width:40%;
    }

    .not{
        background-color:white;
    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        font-size:18px;
}

    td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    width:50%;
    }

    tr:nth-child(even) {
    background-color: #dddddd;
    }

    .description{
        padding-top:3rem;
        font-size:22px;
    }

    .btn{
        margin:3rem 0 3rem 0;
    }


    @media screen and (max-width:760px){
        .results_content{
        display:flex;
        justify-content:center;
        flex-direction:column;
        width:80%;
    }



    td{
        width:60%;
    }  


    .result_tables:last-child{
        margin-bottom:4rem;
    }

    }




</style>

<script>
    window.onload = function () {
    document.getElementById("download")
        .addEventListener("click", () => {
            const results = this.document.getElementById("results");
            console.log(results);
            console.log(window);
            var opt = {
                margin: 1,
                filename: '2022 ASSAG ELECTION RESULTS.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 20 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf().from(results).set(opt).save();
        })
}
</script>

</body>
</html>
