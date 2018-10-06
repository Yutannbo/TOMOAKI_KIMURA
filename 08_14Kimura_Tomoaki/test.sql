-- UPDATEサンプル
UPDATE gs_an_table SET name='木村　正一',email='masakazu@gmail.com',age=72,naiyou='父' WHERE id = 8

UPDATE gs_an_table SET name=:name,email=:email,age=:age,naiyou=:naiyou WHERE id = :id

DELETE FROM gs_an_table WHERE id = :id

SELECT * FROM gs_user_table WHERE lid=:lid,lpw=:lpw AND life_flg=0