<div class="span12">
                <div class="module">
                    <div class="module-head">
                        <h3>News Feed</h3>
                    </div>
                    <div class="module-body">
                        <div class="stream-list">
                            <!-- <div class="media stream new-update">
                                            <a href="#">
                                                <i class="icon-refresh shaded"></i>
                                                11 updates
                                            </a>
                                        </div> -->
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-striped	 display" width="100%">
                                <thead>
                                    <th></th>
                                </thead>
                                <tbody>
                                    <?php
                                    $obj = new Backend;
                                    $conn = $obj->connection();
                                    $query = mysqli_query($conn, "SELECT * FROM News ORDER BY Dofp DESC LIMIT 4") or die(mysqli_error($conn));
                                    $rows = mysqli_fetch_all($query, MYSQLI_ASSOC);
                                    foreach ($rows as $row) :
                                        $res = $obj->fetch($conn, 'Employees', $row['postedBy'], 'idE');
                                        $result = $obj->fetch($conn, 'Users', $res['idUsers'], 'idUsers');

                                    ?><tr>
                                            <td>
                                                <div class="media stream">
                                                    <a href="#" class="media-avatar medium pull-left">
                                                        <img src="../uploads/<?php echo $retVal = (isset($result['pic'])) ? $result['pic'] : null; ?>">
                                                        <h6 class="stream-author offset4">
                                                            <?php echo $result['Username']; ?>
                                                        </h6>
                                                    </a>
                                                    <div class="media-body module-head">
                                                        <div class="stream-headline">
                                                            <div class="offset3">
                                                                <h4><?php echo $row['Ntitle']; ?></h4>
                                                            </div>
                                                            <div class="stream-text">
                                                                <?php echo $row['Ndetail']; ?>
                                                            </div>
                                                            <div class="offset6">
                                                                <h6 class="stream-author">
                                                                    <?php echo $row['Dofp']; ?></h6>
                                                            </div>
                                                            <!-- <a type="submit" href="npost.php?edit=<?php echo $row['idN']; ?>" class="offset7 btn btn-large">Edit</a> -->
                                                        </div>
                                                        <!--/.stream-headline-->
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!--/.media .stream-->

                            <!--/.media .stream-->
                        </div>
                        <!--/.stream-list-->
                    </div>
                    <!--/.module-body-->
                </div>
            </div>