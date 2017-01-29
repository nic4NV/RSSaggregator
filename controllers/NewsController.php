<?php

include_once ROOT. '/models/News.php';


class NewsController {

    public function actionIndex()   //MAIN PAGE
    {
        $newsList = array();
        $newsList = News::getNewsList();
        
        $userId = User::checkLogged();
        $user = User::getUserById($userId);
        
        require_once(ROOT.'/views/news/index.php');
  
        return true;
    }

    public function actionView($id) {   //PAGE WITH ARTICLE
        if ($id) {
            $newsItem = News::getNewsItemById($id);
            $commentsItem = News::getCommentsByNewsId($id);

            $name = '';
            $email = '';
            $password = '';

            if (isset($_POST['submit'])) {
                $posts = htmlspecialchars(stripslashes($_POST['post']));
                $user_id = User::checkLogged();
                $news_id = $id;

                $result = News::post($posts, $user_id, $news_id);

                //return to page
                $referrer = $_SERVER['HTTP_REFERER'];
                header("Location: $referrer");
            }

            require_once(ROOT . '/views/article/index.php');
        }

        return true;
    }
    
    
    
    public function actionEdit($id) {   //ARTICLE EDITING PAGE
        $news = News::getNewsItemById($id);
        
        $userId = User::checkLogged();
        $user = User::getUserById($userId);  //use it to know if admin
        
        $title = $news['title'];
        $content = $news['content'];

        $result = false;

        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $content = $_POST['content'];
        $result = News::edit($id, $title, $content);    
        }
        
        require_once(ROOT . '/views/edit/index.php');
            return true;
    }
    
    public function actionDelete($id) {   //ARTICLE DELETE PAGE
        $news = News::getNewsItemById($id);
        $result = News::delete($id);

        header('Location: /');
    }

    
    public function actionUpdate() {   //ACTION FOR UPDATE-BUTTON
        News::deleteAllNews();
        $data = News::getXML('https://www.nasa.gov/rss/dyn/lg_image_of_the_day.rss');
        News::update($data);
        header('Location: /');
    }

}
