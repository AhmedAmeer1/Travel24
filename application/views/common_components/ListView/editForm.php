<style>
.book-form-box {
    padding: 20px;
    background: #d6dfe7;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.book-form-box .form-heading {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 5px;
    text-align: left;
}

.book-form-box .form-group {
    margin-bottom: 15px;
}

.book-form-box .form-control {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.book-form-box .multi-root {
    background: none;
    border: none;
    color: #007bff;
    cursor: pointer;
    padding: 0;
    font-size: 14px;
}

.book-form-box .btn-primary {
    background-color: #ff6500;
    border-color: #ff6500;
    color: #fff;
    padding: 10px;
    width: 100%;
    border-radius: 4px;
    font-size: 16px;
    font-weight: 600;
}

.book-form-box .btn-primary:hover {
    background-color: #ff6500;
    border-color: #ff6500;
}



.book-form-box .add-waypoint-wrap {
    display: flex;
    justify-content: flex-end;

}

.book-form-box .multi-root {
    color: #000;
    /* text + icon */
}

.book-form-box .multi-root i {
    color: #000;
    /* force icon black */
}


/* Make input values red & bold */
.book-form-box .form-control {
    color: black;
    font-weight: bold;
}
</style>












<!-- ================= EDIT FORM  ================= -->
<section id="editRouteContainer" class="limits-banner">
    <div class="banner_container mt-4">
        <div class="row">
            <div class="col-md-6 box-padding">

                <div class="book-form-box">
                    <p class="form-heading">Edit Your Journey</p>

                    <form action="<?= base_url('Index/Search'); ?>" method="post">

                        <!-- Pickup -->
                        <div class="form-group">
                            <input type="text" class="form-control autocompleteDoc" name="source" id="pickPoint"
                                required placeholder="Pickup Location">
                            <input type="hidden" id="sourceLat" name="sourceLat">
                            <input type="hidden" id="sourceLon" name="sourceLon">
                        </div>

                        <div class="way-points"></div>
                        <input type="hidden" id="total_way_points" name="total_way_points">

                        <!-- Destination -->
                        <div class="form-group">
                            <div class="add-waypoint-wrap mb-2">
                                <button type="button" class="multi-root">
                                    <i class="fa fa-plus-circle"></i> Multi Route
                                </button>
                            </div>
                            <input type="text" class="form-control autocompleteDoc" name="destination" id="dropPoint"
                                required placeholder="Destination">

                            <input type="hidden" id="destLat" name="destLat">
                            <input type="hidden" id="destLong" name="destLong">
                            <input type="hidden" id="total_way_points" name="total_way_points">
                        </div>

                        <button type="submit" id="updateRouteBtn" class="btn btn-primary btn-block">
                            UPDATE ROUTE
                        </button>
                    </form>
                </div>

            </div>
            <div class="col-md-6 banner-details mt-5">
                <!-- Banner Features Section -->
                <?php $this->load->view('common_components/Home/banner_features'); ?>

            </div>
        </div>
    </div>
</section>