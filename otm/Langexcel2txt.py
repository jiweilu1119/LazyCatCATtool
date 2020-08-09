import xlrd  # 引入模块

# 打开文件，获取excel文件的workbook（工作簿）对象
workbook = xlrd.open_workbook("corpus.xls")  # 文件路径
worksheet=workbook.sheet_by_index(1)
nrows=worksheet.nrows  #获取该表总行数

with open('LangText.txt','w') as f:
    f.write('中文是：\n')
    for i in range(nrows): #循环打印每一行
        cell_value1 ='\'' +  worksheet.cell_value(i, 0) + '\' => \''+ worksheet.cell_value(i, 1) + '\','
        f.write(cell_value1 + '\n')

    f.write('\n英文是：\n')

    for i in range(nrows):  # 循环打印每一行
        cell_value1 = '\'' + worksheet.cell_value(i, 0) + '\' => \'' + worksheet.cell_value(i, 2) + '\','
        f.writelines(cell_value1 + '\n')
