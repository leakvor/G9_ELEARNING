<div class="container-fluid pt-4 px-4">
    <div class="form-row" style="display: flex; flex-direction: column;">
        <form class="d-none d-md-flex ">
            <input class="form-control bg-dark mt-3 mb-3" style="border: 1px solid gray;width:200px" type="search" id="search1" placeholder="Search by id of course" name="user_id" >
        </form>
        <!-- table payment -->
        <div class="table-wrapper-scroll-y my-custom-scrollbar">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">user_id</th>
                        <th scope="col">course_id</th>
                        <th scope="col">paid</th>
                        <th scope="col">date</th>
                        <th scope="col">numberofCard</th>
                        <th scope="col">cvv</th>
                        <th scope="col">nameonCard</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($payments as $index => $payment) :
                    ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= $payment['user_id'] ?></td>
                            <td><?= $payment['course_id'] ?></td>
                            <td><?= $payment['paid'] ?></td>
                            <td><?= $payment['date'] ?></td>
                            <td><?= $payment['numberofCard'] ?></td>
                            <td><?= $payment['cvv'] ?></td>
                            <td><?= $payment['nameonCard'] ?></td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
                </tbody>
            </table>
        </div>
    </div>  
    