<div class="container-fluid pt-4 px-4">
    <div class="form-row" style="display: flex; flex-direction: column;">
        <div class="for-row" style="display: flex;">
            <form class="d-none d-md-flex ">
                <input class="form-control bg-dark mt-3 mb-3" style="border: 1px solid gray;width:200px" type="search" id="search1" placeholder="Search by id of course" name="user_id">
            </form>
            <form class="d-none d-md-flex" style="margin-left: 40px;">
                <input class="form-control bg-dark mt-3 mb-3" style="border: 1px solid gray;width:200px" type="search" id="search3" placeholder="Search (YYYY-MM)" name="date">
            </form>
        </div>
        <div class="table-wrapper-scroll-y my-custom-scrollbar">
            <!-- table payment -->
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">User_id</th>
                        <th scope="col">Course_id</th>
                        <th scope="col">Paid</th>
                        <th scope="col">Date</th>
                        <th scope="col">NumberofCard</th>
                        <th scope="col">Cvv</th>
                        <th scope="col">NameonCard</th>
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
                    <?php endforeach; ?>
                </tbody>
                </tbody>
            </table>
        </div>
    </div>