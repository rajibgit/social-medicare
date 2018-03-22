<?php
error_reporting(E_ERROR | E_PARSE);
require_once("includes/initialize.php");	
include 'header.php';
?>
<?php
function getImagepath($user_id) {
	$db = new PDO('mysql:host=localhost; dbname=saibah_medicare;', 'root', '');
	$stmt = $db->prepare("SELECT * FROM photos WHERE member_id=?");
	$stmt->execute(array($user_id));
	$image_result = $stmt->fetchAll();

	return "uploads/".$image_result[0]['filename'];
}
?>


				
<div class="container">
      <div class="col-md-10 col-md-offset-1">
        <?php
          $db = new PDO('mysql:host=localhost; dbname=saibah_medicare;', 'root', '');
          $stmt = $db->prepare("SELECT comment_id, COUNT(*) FROM subcomment GROUP BY comment_id ORDER BY COUNT(*) DESC ");
          $stmt->execute(array());
          $result = $stmt->fetchAll();

          foreach ($result as $key => $value) {
            $stmt = $db->prepare("SELECT * FROM comments WHERE id=?");
            $stmt->execute(array($value['comment_id']));
            $post_result = $stmt->fetchAll();


            echo "<div class='panel panel-info'>
            <div class = 'panel-heading'>
              <div class='row'>
                <div class='col-md-1'>
                  <img src='".getImagepath($post_result[0]['member_id'])."' class='img-rounded' height='50px' width='50px' >
                </div>
                <div class='col-md-10'>
                  <a href='#'><font size='4'>".$post_result[0]['author']."</font></a>
                  <br />
                  <font size='1'>".$post_result[0]['created']."</font>
                </div>";

                //if($post_result[0]['owner_id'] == $_SESSION['user_id']) {
                  echo "<div class='col-md-1'>
                    <div class='text-right'>
                      <div class='dropdown'>
                        <a class='dropdown-toggle' data-toggle='dropdown' href='#'><span class='glyphicon glyphicon-menu-down'></span></a>
                        <ul class='dropdown-menu'>
                          <li><a href='#'><span class='glyphicon glyphicon-edit'></span> &nbsp; Edit post</a></li>
                          <li class='divider'></li>
                          <li><a href='#'><span class='glyphicon glyphicon-trash'></span> &nbsp; Delete post</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>";
                //}
              echo "</div>
            </div>

            <div class='panel-body'>".$post_result[0]['content']."</div>";

            
            $stmt = $db->prepare("SELECT * FROM subcomment WHERE comment_id=?");
            $stmt->execute(array($value['comment_id']));
            $comment_result = $stmt->fetchAll();


            foreach ($comment_result as $comment_key => $comment_value) {
              echo "<div class='panel-footer'>
                <div class='row'>
                  <div class='col-md-1'><img src='".getImagepath($comment_value['member_id'])."' class='img-circle' height='40px' width='40px'/></div>
                  <div class='col-md-11'>
                    <p><strong><a href='#'>".$comment_value['subauthor']."</a></strong> ".$comment_value['subcontent']."</p>
                    <font size='1'><footer class='text-muted'>".$comment_value['created']."</footer></font>
                  </div>
                </div>
              </div>";
            }

            echo "<div class='panel-footer'>
              <div class='row'>
                <div class='col-md-1 hidden-xs'><div class='text-center'><img src='".getImagepath($_SESSION['member_id'])."' class='img-rounded' height='40px' width='40px'/></div></div>
                <div class='col-md-11'>
                  <form action='' method='POST'>
                    <textarea style='resize: none;' class='form-control no-resize' rows='1' placeholder='Write a comment...' id='comment_body' name='comment_body' onkeydown='if (event.keyCode == 13 && !event.shiftKey) { this.form.submit(); return false; }'></textarea>
                  </form>
                </div>
              </div>
            </div>
          </div>";
          }
        ?>
      </div>
    </div>

  </body>
