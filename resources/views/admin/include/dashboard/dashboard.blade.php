<style>
    .page-body {
        position: relative;
        min-height: calc(100vh - 100px) !important; /* ensures it fills screen below header if needed */
    }

    /* perfectly center the welcome message */
    .welcome-center {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
    }

    /* optional: prevent overlap if breadcrumb is long */
    .page-body .breadcrumb {
        margin-bottom: 0;
        padding-top: 15px;
    }

</style>
<div class="page-body position-relative">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12"> 
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">
                                <svg class="stroke-icon">
                                    <use href="{{asset('admin/svg/icon-sprite.svg#stroke-home')}}"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Centered content -->
    <div class="welcome-center">
        <h3>Welcome to Admin Dashboard</h3>
    </div>
</div>
