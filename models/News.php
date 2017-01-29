 <?php

class News
{
    public static function getNewsItemById($id)   // get array for /article/$1
    {
        $id = intval($id);
        
        if ($id) {
            $db = Db::getConnection();
       
            $result = $db->query('SELECT * from news WHERE id =' . $id);
            
            $result->setFetchMode(PDO::FETCH_ASSOC);
            
            $newsItem = $result->fetch();
            
            return $newsItem;
        }
    }
    
    public static function getNewsList()   // get news array for main page
    {
        $db = Db::getConnection();
        
        $newsList = array();
        
        $result = $db->query('SELECT news.id, news.title, news.public_date, news.upload_date, news.preview, COUNT(comments.post) AS comments '
                . 'FROM comments RIGHT JOIN '
                . 'news on news.id = comments.news_id '
                . 'GROUP BY id '
                . 'ORDER BY public_date DESC '
                . 'LIMIT 20');
        
        $i = 0;
        while ($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['upload_date'] = $row['upload_date'];
            $newsList[$i]['public_date'] = $row['public_date'];
            $newsList[$i]['comments'] = $row['comments'];
            $newsList[$i]['preview'] = $row['preview'];
            $i++;
        }
        
        return $newsList;
    }
    
    public static function edit($id, $title, $content) {   //update title and Content by newsId
        $db = Db::getConnection();

        $sql = 'UPDATE news 
                SET title = :title, content = :content
                WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        $result->bindParam(':title', $title, PDO::PARAM_STR);
        $result->bindParam(':content',  $content, PDO::PARAM_STR);

        return $result->execute();
    }
    
    public static function delete($id) {      // delete news article by id
        $db = Db::getConnection();

        $sql = 'DELETE FROM news 
                WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_STR);

        return $result->execute();
    }
    
    public static function getCommentsByNewsId($id) { // get comment array of article for /article/$1 
        if ($id) {
            $db = Db::getConnection();
            $comments = array();
            $result = $db->query("SELECT comments.id, comments.post, comments.date, comments.news_id, user.name, user.id "
                    . "FROM comments INNER JOIN user ON user.id = comments.user_id "
                    . "WHERE comments.news_id = " . $id
                    . " ORDER BY comments.date DESC LIMIT 30");

            $i = 0;
            while ($row = $result->fetch()) {
                $comments[$i]['id'] = $row['id'];
                $comments[$i]['post'] = $row['post'];
                $comments[$i]['date'] = $row['date'];
                $comments[$i]['name'] = $row['name'];
                $i++;
            }
            return $comments;
        }
    }

    public static function post($post, $user_id, $news_id) {   // post comment function on /article/$1
        $db = Db::getConnection();
        $sql = 'INSERT INTO comments (post, user_id, news_id) '
                . 'VALUES (:post, :user_id, :news_id)';
        $result = $db->prepare($sql);
        $result->bindParam(':post', $post, PDO::PARAM_STR);
        $result->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $result->bindParam(':news_id', $news_id, PDO::PARAM_STR);

        return $result->execute();
    }

    public static function getXML($file_url) {   // getting XML and making array
        $XMLFile = simplexml_load_file($file_url);
        $data = array();
        for ($i = 0; $i < 15; $i++) {

            $data[$i]['title'] = $XMLFile->channel->item[$i]->title;
            $data[$i]['description'] = $XMLFile->channel->item[$i]->description;
            $data[$i]['enclosure'] = $XMLFile->channel->item[$i]->enclosure['url'];
            $data[$i]['pubDate'] = $XMLFile->channel->item[$i]->pubDate;
            $data[$i]['link'] = $XMLFile->channel->item[$i]->link;
        }
        return ($data);
    }
 

    public static function update($data) {      // upload DB
        $db = Db::getConnection();
       
      for ($i = 0; $i < 15; $i++) {          // insert new data to DB
            $title = addslashes($data[$i]['title']);
            $public_date = date("Y-m-d H:i:s", strtotime($data[$i]['pubDate']));   //also magic with Date format
            $content = addslashes($data[$i]['description']);
            $preview = $data[$i]['enclosure'];
            $link = addslashes($data[$i]['link']);
            
            // insert new data to DB
            if ($i == 0) {          // if first iteration
                $sql = "INSERT INTO news (title, public_date, content, preview, link) "
                        . "VALUES ('$title', '$public_date', '$content', '$preview', '$link')";
            } else {
                $sql = $sql . ", ('$title', '$public_date', '$content', '$preview', '$link')";
            }
        }
        $result = $db->query($sql);
        return $result;
    }
    
        public static function deleteAllNews() {      // delete all news from current list
        $db = Db::getConnection();

        $sql = 'DELETE FROM news';

        $result = $db->query($sql);
        return $result;
    }
    

}
