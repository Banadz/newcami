
{{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> --}}
<script>window.jQuery || document.write('<script src="src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
<style>
    #preloader1 {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.8);
        z-index: 9999;
    }
    #loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        width: 120px;
        height: 120px;
        animation: spin 2s linear infinite;
        position: absolute;
        top: 50%;
        left: 50%;
        margin-top: -60px;
        margin-left: -60px;
    }
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* ============= */
     #preloader2 {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #fff;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    #logo img {
        width: 320px;
        height: 80px;
    }

    #progress-bar {
        width: 80%;
        max-width: 400px;
        height: 20px;
        background-color: #f0f0f0;
        border-radius: 10px;
        margin-top: 20px;
    }

    #progress {
        width: 0%;
        height: 100%;
        background-color: #3498db;
        border-radius: 10px;
        transition: width 0.3s ease;
    }
    .deactivate{
        display: none !important;
    }

</style>

<div id="preloader1">
    <div id="loader">
    </div>
</div>

{{-- ================================================================= --}}

<div id="preloader2" class="deactivate">
    <div id="logo">
        <img src="images/auth/CAMI1@300x.png" alt="Logo de votre application">
    </div>
    <div id="progress-bar">
        <div id="progress"></div>
    </div>
</div>

<script src="modules/.personnel/preloader/loading.js"></script>
