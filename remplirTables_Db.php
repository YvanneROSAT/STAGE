
<?php  
                   //connexion base de donnée
                   include 'connectDbb.php';
include 'importData.php';
                   //requete  
deleteGroupe();  
                   $liste = allGroupe();   

                       echo "<table class='table mx-auto w-75' id='tbl'>";
                       echo "<tr>";
                       echo "<th onclick='sortTable(0)' scope='col'>nomGroupe</th>";
                       echo "<th onclick='sortTable(0)' scope='col'>Apprenant</th>";
                      
                  
                       echo "</tr>";
                       foreach ($liste as $unApprenant) 
                       {
			addGrp($unApprenant['CodeGroupe'], $unApprenant['nomGroupe']);
                           echo "<tr>";
                           echo "<td>".$unApprenant['nomGroupe']."</td>";
                           echo "<td>
                               insertion ok
                                </td>";
                                                    

                           echo "</tr>";
                       }  
                       echo "</table>"
                       ?>
