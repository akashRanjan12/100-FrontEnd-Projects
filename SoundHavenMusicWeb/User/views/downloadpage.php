<style>
    .container{
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        flex-wrap: wrap-reverse;
        height: 80svh;
        gap: 10px;
        .data{
            width: 500px;
            .logo{
                font-size: 34px;
            }
            .content{
                font-size: 1.2rem;
            }

        }
        .illustration{
            z-index: 1;
        }
    }
    @media (max-width:1020px){
        .container{
            height: auto;
            img{
                width: 300px;
            }
            .data{
                width: 95%;
            }
        }
    }
</style>

<div class="container">
    <div class="data">
        <p class="logo">
        𝄞 S☆und Haven
        </p><br>
        <p class="content">
        <i class="fa-solid fa-bars-staggered"></i> "You can easily download your favorite music directly from the player by clicking on the three-dot menu icon.
        <br><br><i class="fa-solid fa-bars-staggered"></i>  Once clicked, a dropdown menu will appear with the 'Download' option. 
        <br><br><i class="fa-solid fa-bars-staggered"></i> Simply select it to save the track to your device for offline listening.
        <br><br><i class="fa-solid fa-bars-staggered"></i> This feature ensures you always have access to your favorite songs, even without an internet connection."
        </p>
    </div>
    <div class="illustration">
        <img src="../assets/rawMat/downloadsectionimage.png" alt="" width="500px">
    </div>
</div>