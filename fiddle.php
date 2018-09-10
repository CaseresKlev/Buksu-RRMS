  <!-- query for displaying report for printing -->

  <?php
  $connect = mysqli_connect("localhost", "root", "", "db_rrms");
  //$query ="SELECT * FROM book ORDER BY book_id DESC";
  $query = "SELECT book.book_id, book.book_title, book.pub_date, (SELECT department.cat_name FROM department WHERE book.department = department.id) as 'dept', book.status, (SELECT concat('',(GROUP_CONCAT((select concat( author.a_lname, ',', SUBSTRING(author.a_fname, 1,1))) SEPARATOR '; '))) as authors FROM junc_authorbook INNER JOIN author on author.a_id = junc_authorbook.aut_id WHERE junc_authorbook.book_id = book.book_id) AS 'authors' FROM book INNER JOIN junc_authorbook on book.book_id = junc_authorbook.book_id WHERE 1";
  $result = mysqli_query($connect, $query);


?>

<!doctype html>

          -- plugins for jquery report viewer
  <html>
      <head>
        <title>RRMS FILTER REPORTS</title>
        <script src="jquery/ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
          <link rel="stylesheet" type="text/css" href="css/buttons.dataTables.min.css">

      </head>

      <body>
               
        <center><h1>RRMS REPORTS</h1></center>
        <table id="example" class="display nowrap" cellspacing="0" width="100%">
          <thead style="text-align: left;">
            <tr>
              <th>Book ID</th>
              <th>Book Title</th>
              <th>Date</th>
              <th>Department</th>
              <th>Status</th>
              <th>Authors</th>


            </tr>
          </thead>
          <tbody>
            <?php

              while ($row = mysqli_fetch_array($result))
              {
                echo '
                  <tr>
                    <td>'.$row["book_id"].'</td>
                      <td>'.$row["book_title"].'</td>
                        <td>'.$row["pub_date"].'</td>
                          <td>'.$row["dept"].'</td>
                            <td>'.$row["status"].'</td>
                              <td>'.$row["authors"].'</td>



                  </tr>
                  ';
              }



              ?>
          </tbody>

        </table>


          <script type="text/javascript" src="js/jquery-3.3.1.js"> </script>
           <script type="text/javascript" src="js/dataTables.min.js"> </script>
            <script type="text/javascript" src="js/dataTables.buttons.min.js"> </script>
              <script type="text/javascript" src="js/buttons.flash.min.js"> </script>
                <script type="text/javascript" src="js/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"> </script>
                  <script type="text/javascript" src="js/buttons.print.min.js"> </script>

                    <script type="text/javascript" src="js/buttons/1.5.2/js/buttons.html5.min.js"> </script>


                        <script type="text/javascript" src="js/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"> </script>
                          <script type="text/javascript" src="js/ajax/libs/jszip/3.1.3/jszip.min.js"> </script>
                            <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"> </script>




            <script type="text/javascript">
            $(document).ready(function() {
      $('#example').DataTable( {
          dom: 'Bfrtip',
          button: [
                'print','pdf'
          ]
      } );
  } );

            </script>

      </body >



  </html>
