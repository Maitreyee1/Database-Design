import csv
import numpy as np
import datetime

with open('Contacts.csv') as csv_file:
    csv_reader = csv.reader(csv_file, delimiter=',')
    dataset=[]
    for row in csv_reader:
        dataset.append(row)

# Contacts Table
with open('Contacts_table.txt', mode='w') as csvw_file:
    csvw_writer = csv.writer(csvw_file, delimiter=',', quotechar='"', quoting=csv.QUOTE_MINIMAL)

    for i in range(1,len(dataset)):
        arr=dataset[i]
        csvw_writer.writerow(arr[0:4])

import pandas as pd
df = pd.read_csv('Contacts.csv')
#print df

contact_id = df.contact_id #you can also use df['column_name']
home_add = df.home_address.astype('str')
home_city = df.home_city.astype('str')
home_state = df.home_state.astype('str')
home_zip=df.home_zip.astype('str')
work_add = df.work_address.astype('str')
work_city = df.work_city.astype('str')
work_state = df.work_state.astype('str')
work_zip=pd.to_numeric(df['work_zip'])
work_zip = df.work_zip.astype('str')
home_phone=df.home_phone.astype('str')
cell_phone=df.cell_phone.astype('str')
work_phone=df.work_phone.astype('str')
birth_date=df.birth_date.astype('str')

arrh=[]
arrw=[]
arr_b=[]
for i in range(len(df)):
    if home_add[i]=='nan':
        home_add[i]=''
    if home_city[i]=='nan':
        home_city[i]=''
    if home_state[i]=='nan':
        home_state[i]=''
    if home_zip[i]=='nan':
        home_zip[i]=''
    if work_add[i]=='nan':
        work_add[i]=''
    if work_city[i]=='nan':
        work_city[i]=''
    if work_state[i]=='nan':
        work_state[i]=''
    if work_zip[i]=='nan':
        work_zip[i]=''
    if home_phone[i]=='nan':
        home_phone[i]=''
    if cell_phone[i]=='nan':
        cell_phone[i]=''
    if work_phone[i]=='nan':
        work_phone[i]=''
    if birth_date[i]=='nan':
        birth_date[i]=''



    

    arrh.append((contact_id[i],'home',home_add[i],home_city[i],home_state[i],home_zip[i]))
    arrw.append((contact_id[i],'work',work_add[i],work_city[i],work_state[i],work_zip[i]))
    arr_b.append((contact_id[i],'birth date',birth_date[i]))

with open('Date_table.txt', mode='w') as csvw_file:
    csvw_writer = csv.writer(csvw_file, delimiter=',')

    for i in range(len(arr_b)):
        temp=arr_b[i]
        csvw_writer.writerow(temp)


with open('Home_add_table.txt', mode='w') as csvw_file:
    csvw_writer = csv.writer(csvw_file, delimiter=',')

    for i in range(len(arrh)):
        temp=arrh[i]
        csvw_writer.writerow(temp)

with open('Work_add_table.txt', mode='w') as csvw_file:
    csvw_writer = csv.writer(csvw_file, delimiter=',')

    for i in range(len(arrw)):
        temp=arrw[i]
        csvw_writer.writerow(temp)



#Home Phone Number
area_code=[]
ph=[]
for i in range(len(home_phone)):
    if home_phone[i]=='nan':
        area_code.append('')
        ph.append('')
    else:
        temp=home_phone[i]
        area_code.append(temp[0:3])
        ph.append(temp[4:])

arr_p=[]
for i in range(len(home_phone)):
    if area_code[i]=='':
        arr_p.append((contact_id[i],'','',''))
    else:
        arr_p.append((contact_id[i],'home',area_code[i],ph[i]))
        
    
with open('Homephone_table.txt', mode='w') as csvw_file:
    csvw_writer = csv.writer(csvw_file, delimiter=',')

    for i in range(len(arr_p)):
        temp=arr_p[i]
        csvw_writer.writerow(temp)


#Cell Phone Number        
area_code=[]
ph=[]
arr_p=[]
for i in range(len(cell_phone)):
    if cell_phone[i]=='nan':
        area_code.append('')
        ph.append('')
    else:
        temp=cell_phone[i]
        area_code.append(temp[0:3])
        ph.append(temp[4:])
for i in range(len(cell_phone)):
        if area_code[i]=='':
            arr_p.append((contact_id[i],'','',''))
        else:
            arr_p.append((contact_id[i],'cell',area_code[i],ph[i]))

with open('Cellphone_table.txt', mode='w') as csvw_file:
    csvw_writer = csv.writer(csvw_file, delimiter=',')

    for i in range(len(arr_p)):
        temp=arr_p[i]
        csvw_writer.writerow(temp)
        
#Work Phone Number
area_code=[]
ph=[]
arr_p=[]


for i in range(len(work_phone)):
    if work_phone[i]=='nan':
        area_code.append('')
        ph.append('')
    else:
        temp=work_phone[i]
        area_code.append(temp[0:3])
        ph.append(temp[4:])

for i in range(len(work_phone)):
        if area_code[i]=='':
            arr_p.append((contact_id[i],'','',''))
        else:
            arr_p.append((contact_id[i],'work',area_code[i],ph[i]))


with open('Workphone_table.txt', mode='w') as csvw_file:
    csvw_writer = csv.writer(csvw_file, delimiter=',')

    for i in range(len(arr_p)):
        temp=arr_p[i]
        csvw_writer.writerow(temp)








