#!/usr/lib/ruby
# -*- coding: utf-8 -*-
require 'bigdecimal'
require 'bigdecimal/util'
require 'natto'
#########################################################################
#新書本
text_file = "sinsyo_bm25.txt"
#text_file = "sinsyo_bm25_mini.txt"
file = open(text_file)

text = Array.new
file.each_line {|line|
  line.chomp!
  text.push(line)
}
#p text

#1要素ずつ配列に入れる
sinsyo_bm25_a = Array.new
  text.each {|a|
  sinsyo_bm25_a.push(a.split(",")) #バーで区切ったものが二重配列の最も中身
}
#p sinsyo_bm25


sinsyo_bm25_h = Hash.new{|hash, key| hash[key] = []}
sinsyo_bm25_a.each{|a|
    sinsyo_bm25_h[a[0]].push([a[1],a[2]])
}
#p sinsyo_bm25_h #タイトルをキーとして、値として、単語とその重みのペアの配列をもつハッシュ
i = 1
file_name = ""
sinsyo_bm25_h.each{|k,v|
file_name = "data"+i.to_s+".txt"
  File.open(file_name,"w") do |text|
    v.each{|vv|
      input_text = vv[0]+","+vv[1]+"\n"
#p input_text
      text.puts(input_text)
    }
  end
i += 1
}
