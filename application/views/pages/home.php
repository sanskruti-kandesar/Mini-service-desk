    <section class="app__section">
        <div class="app__section-div1">
            <h1 class="app__div1-h1">Welcome to Almashines</h1>
            <p class="app__div1-p">Search, ask and submit a ticket.</p>
            <form class="app__search">
                <input class="app__div1-search" type="text" placeholder="Search">
                <input class="app__div1-button" type="image" src="<?php echo base_url('images/search.png')?>" alt="search">
            </form>
        </div>

        <div class="app__section-div2">
            <div class="div2-support">
                <img class="support-img" src="<?php echo base_url('images/support1.png') ?>" alt="">
                <p class="support-text">Support</p>
            </div>
            <div class="div2-support">
                <img class="support-img" src="<?php echo base_url('images/support2.png') ?>" alt="">
                <p class="support-text">Talk to us</p>
            </div>
            <div class="div2-support">
                <img class="support-img" src="<?php echo base_url('images/support3.png') ?>" alt="">
                <p class="support-text">help</p>
            </div>
        </div>

        <div class="app__section-div3">
            <h2 class="div3-h2">Popular Articles</h3>

                <div style="display: flex;flex-direction: row;align-items: center;">
                    <img class="article-img" src="<?php echo base_url('images/article.png') ?>" alt="">
                    <p class="article-text">How to add ticket ?</p>
                </div>
                <br>
                <div style="display: flex;flex-direction: row;align-items: center;">
                    <img class="article-img" src="<?php echo base_url('images/article.png') ?>" alt="">
                    <p class="article-text">How to add members ?</p>
                </div>
                <br>
                <div style="display: flex;flex-direction: row;align-items: center;">
                    <img class="article-img" src="<?php echo base_url('images/article.png') ?>" alt="">
                    <p class="article-text">How to see ticket status ?</p>
                </div>
        </div>
    </section>