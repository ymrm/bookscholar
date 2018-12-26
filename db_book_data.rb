#!/usr/lib/ruby
# -*- coding: utf-8 -*-

text_file = "sinsyo_list.txt" #新書として扱うデータだけを出力したテキスト
file = open(text_file)
text = Array.new
file.each_line {|line|
  line.chomp! #**********を目印に1冊ずつに区切る
  text.push(line)
}
text = text.join(",")
#p text
# text.each{
#}#
allay1 = Array.new
allay1 = text.split(",**********")
#p allay1[0]
allay2 = Array.new #二重配列にする
allay1.each {|a|
  b = a.split(",")
  allay2.push(b)
}
#p allay2

allay3 = Array.new #ハッシュを入れる配列
h = Hash.new #配列をハッシュ化
allay2.each{|a|
  h = Hash[*a]
  allay3.push(h)
}
#p allay3
id = 0
allay3.each{|a|
  titl = a["01"] #タイトル
  inst = a["08"]#内容説明
  cont = a["09"] #目次
if titl != nil && inst !=nil && cont != nil
print "elsif a[0] == \"", titl, "\"\n"
print "  hash[",id,"].push([a[1],a[2].to_f])\n" 
#print "\"",inst,"\"\n"

#print "\"",cont,"\"\n"
id += 1
end
}

