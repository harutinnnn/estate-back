## CI4 CRM Admin modules

### For module creation ML(Multilingual)

You need create 2 tables for example Posts module You need Create post and post_ml tables

**Post table**

```sql
    CREATE TABLE post (
        id int(11) unsigned NOT NULL AUTO_INCREMENT,
        status int(1) unsigned NOT NULL,
        img varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        created_at datetime DEFAULT CURRENT_TIMESTAMP,
        updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (id)
    ) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```
**Attention for each Multilingual table you need add relation with parent table and add an index on columns parent_id,lang UNIQUE**  

**Post ML table**

```sql
    CREATE TABLE post_ml (
      id int(11) unsigned NOT NULL AUTO_INCREMENT,
      parent_id int(11) unsigned NOT NULL,
      lang char(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
      title varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
      content mediumtext COLLATE utf8mb4_unicode_ci,
      PRIMARY KEY (id),
      UNIQUE KEY parent_id (parent_id,lang),
      CONSTRAINT content_ml_ibfk_1 FOREIGN KEY (parent_id) REFERENCES content (id) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

### Models creation part

```php
    namespace App\Models;
    use CodeIgniter\Model;
    
    class PostModel extends Model
    {
        public $table = "post";
        protected $primaryKey = "id";
        protected $allowedFields = [
            "status",
            "img",
            "created_at",
            "updated_at",
        ];
    
        public function getItem($id, $lang)
        {
            $tblMl = $this->table . ML_TABLE;
    
            return $this->select("{$this->table}.*, {$tblMl}.title, {$tblMl}.post, {$tblMl}.lang")
                ->join($tblMl, "{$tblMl}.post_id = posts.id")
                ->where("{$tblMl}.id", intval($id))
                ->where("{$tblMl}.lang", $lang)
                ->first();
        }
    
        public function getAllItems($lang)
        {
    
            $tblMl = $this->table . ML_TABLE;
    
            return $this->select("{$this->table}.*, {$tblMl}.title, {$tblMl}.post, {$tblMl}.lang")
                ->join($tblMl, "{$tblMl}.parent_id = {$this->table}.id")
                ->where("{$tblMl}.lang", $lang)->orderBy("{$this->table}.id",'DESC')
                ->findAll();
        }
    
        protected $useTimestamps = true;
    
        protected $returnType = 'object';
    }
```

1. method getItem takes 2 param id,lang and return the row with your set language
2. getAllItems return all items with selected language

```php
    namespace App\Models;
    
    use CodeIgniter\Model;
    
    class PostMLModel extends Model
    {
        protected $table = "post" . ML_TABLE;
        protected $primaryKey = "id";
        protected $allowedFields = [
            "parent_id",
            "lang",
            "title",
            "content",
            "searchfield",
        ];
    
        protected $returnType = 'object';
    }
```