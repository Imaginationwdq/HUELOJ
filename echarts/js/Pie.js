var PieChart = echarts.init(document.getElementById('Pie'));
option = {
    tooltip: {
        trigger: 'item',
        formatter: '{a} <br/>{b}: {c} ({d}%)'
    },
    legend: {
        orient: 'vertical',
        left: 1,
        data: ['直达', '营销广告', '搜索引擎', '邮件营销', '联盟广告', '视频广告', '百度', '谷歌', '必应', '其他']
    },
    series: [
        {
            name: '访问来源',
            type: 'pie',
            center:['50%','50%'],
            selectedMode: 'single',
            
            radius: [0, '21%'],

            label: {
                position: 'inner'
            },
            labelLine: {
                show: false
            },
            data: [
                {value: 335, name: '直达', selected: true},
                {value: 679, name: '营销广告'},
                {value: 1548, name: '搜索引擎'}
            ],
          width:'auto'
        },
        {
            name: '访问来源', //整体的框
            type: 'pie',
            center:['50%','50%'],
            radius: ['28%', '38.5%'],
            label: {
                formatter: '{a|{a}}{abg|}\n{hr|}\n  {b|{b}：}{c}  {per|{d}%}  ',
                backgroundColor: '#eee',
                borderColor: '#aaa',
                borderWidth: 1,
                borderRadius: 4,
                // shadowBlur:3,
                // shadowOffsetX: 2,
                // shadowOffsetY: 2,
                // shadowColor: '#999',
                // padding: [0, 7],
                rich: {
                    a: {
                       //最上层的大小
                        color: '#999',
                        lineHeight: 11,
                        fontSize:8,
                        width:'60%',
                        align: 'center'
                    },
                    hr: {  //中间的线
                        borderColor: '#aaa',
                        width: '100%',
                        borderWidth: 0.5,
                        height: 0
                    },
                    b: {
                        //提示名,谷歌等的字体框
                        fontSize: 8,
                        lineHeight: 18
                    },
                    per: {//小边框
                        width:'50%',
                        left:'70',
                        fontSize:8,
                        color: '#eee',
                        backgroundColor: '#334455',
                        padding: [2, 4],
                        borderRadius: 2
                    }
                }
            },
            data: [
                {value: 335, name: '直达'},
                {value: 310, name: '邮件营销'},
                {value: 234, name: '联盟广告'},
                {value: 135, name: '视频广告'},
                {value: 1048, name: '百度'},
                {value: 251, name: '谷歌'},
                {value: 147, name: '必应'},
                {value: 102, name: '其他'}
            ],
         width:'auto'
        }
    ]
};


PieChart.setOption(option);

