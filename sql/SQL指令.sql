--创建数据库
create database music charset utf8;
--选择数据库
use music;

--创建四张表
create table musics(
    MUSIC_ID varchar(50),
    MUSIC_NAME varchar(300),
    ARTIST_NAME varchar(200),
    ISLOVE varchar (10),
    comment varchar(2000)
    )charset utf8;
create table artists(
    ARTIST_ID varchar(50) ,
    ARTIST_NAME varchar(200),
    isLove varchar(10)
    )charset utf8;
create table comments(
    MUSCI_ID varchar(200),
    MUSIC_NAME varchar(200),
    COMMENTS varchar(2000),
    isLove varchar(10)
    )charset utf8;
create table recommendation(
    MUSIC_ID varchar (200),
    MUSIC_NAME varchar(200),
    isLove varchar(10)
    )charset utf8;
--数据去重
--复制表结构
create table musics_copy select * from musics where 1=2;
--去除重复数据
insert into musics_copy select distinct * from musics;
--删除原表并重命名新表
drop table musics;
rename table musics_copy to musics;
--复制已有表的结构，不复制数据
create table 新表名 like 表名;
--显示所有数据表
show tables;
--查看表结构
describe musics;
--由于有时爬取内容较长，无法放下内容，需要修改属性
alter table musics modify MUSIC_NAME varchar(300);
--查询表中所有数据
select * from artists;
--有时爬取内容有错误，需要删除数据
delete from comments;
--将爬取内容插入artists表
INSERT INTO `artists` (`ARTIST_ID`, `ARTIST_NAME`) VALUES (%s, %s);
--遍历输出ARTIST_ID的值
SELECT `ARTIST_ID` FROM `artists` ORDER BY ARTIST_ID;
--将爬取内容插入相应表
INSERT INTO `musics` (`MUSIC_ID`, `MUSIC_NAME`, `ARTIST_NAME`) VALUES (%s, %s, %s);
INSERT INTO `comments` (`MUSIC_NAME`, `COMMENTS`) VALUES (%s, %s);
INSERT INTO `recommendation` (`MUSIC_ID`, `MUSIC_NAME`) VALUES (%s, %s);
--导出数据库，形成文件
--首先需要修改权限
show variables like "secure_file_priv";
--修改该变量的权限，允许导出文件
set secure_file_priv = '';
select MUSIC_NAME,COMMENTS from comments into outfile 'C:\wamp64\tmp\comments.xlsx';