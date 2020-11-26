var SankChart = echarts.init(document.getElementById('sankey'));
option = {
    series: {
        type: 'sankey',
        layout: 'none',
        focusNodeAdjacency: 'allEdges',
        data: [{
            name: 'a1'
        }, {
            name: 'b1'
        }, {
            name: 'c1'
        }, {
            name: 'd1'
        }, {
            name: 'e1'
        },
        {
            name: 'a2'
        }, {
            name: 'b2'
        }, {
            name: 'c2'
        }, {
            name: 'd2'
        }, {
            name: 'e2'
        },
        {
            name: 'a3'
        }, {
            name: 'b3'
        }, {
            name: 'c3'
        }, {
            name: 'd3'
        }, {
            name: 'e3'
        },
        {
            name: 'a4'
        }, {
            name: 'b4'
        }, {
            name: 'c4'
        }, {
            name: 'd4'
        }, {
            name: 'e4'
        }
        ],
        links: [
            {
            source: 'a1',
            target: 'a2',
            value: 5
        }, 
            {
            source: 'a1',
            target: 'b2',
            value: 5
        }, 
        {
            source: 'a1',
            target: 'c2',
            value: 5
        },
        {
            source: 'a1',
            target: 'd2',
            value: 5
        },
        {
            source: 'a1',
            target: 'e2',
            value: 3
        }, {
            source: 'b1',
            target: 'a2',
            value: 8
        },
        {
            source: 'b1',
            target: 'b2',
            value: 8
        },
        {
            source: 'b1',
            target: 'c2',
            value: 8
        },
        {
            source: 'b1',
            target: 'd2',
            value: 8
        },
        {
            source: 'b1',
            target: 'e2',
            value: 5
        }, 
        {
            source: 'c1',
            target: 'a2',
            value: 5
        }, 
        {
            source: 'c1',
            target: 'b2',
            value: 5
        }, 
        {
            source: 'c1',
            target: 'c2',
            value: 5
        }, 
        {
            source: 'c1',
            target: 'd2',
            value: 5
        }, 
        {
            source: 'c1',
            target: 'e2',
            value: 5
        }, 
        {
            source: 'd1',
            target: 'a2',
            value: 5
        },
        {
            source: 'd1',
            target: 'b2',
            value: 5
        },
        {
            source: 'd1',
            target: 'c2',
            value: 5
        },
        {
            source: 'd1',
            target: 'd2',
            value: 5
        },
        {
            source: 'd1',
            target: 'e2',
            value: 5
        },
        {
            source: 'e1',
            target: 'a2',
            value: 5
        },
        {
            source: 'e1',
            target: 'b2',
            value: 5
        },
        {
            source: 'e1',
            target: 'c2',
            value: 5
        },
        {
            source: 'e1',
            target: 'd2',
            value: 5
        },
        {
            source: 'e1',
            target: 'e2',
            value: 5
        },
        
        //---------------断层分界线 
        
        {
            source: 'a2',
            target: 'a3',
            value: 5
        }, 
            {
            source: 'a2',
            target: 'b3',
            value: 5
        }, 
        {
            source: 'a2',
            target: 'c3',
            value: 5
        },
        {
            source: 'a2',
            target: 'd3',
            value: 5
        },
        {
            source: 'a2',
            target: 'e3',
            value: 3
        }, {
            source: 'b2',
            target: 'a3',
            value: 8
        },
        {
            source: 'b2',
            target: 'b3',
            value: 8
        },
        {
            source: 'b2',
            target: 'c3',
            value: 8
        },
        {
            source: 'b2',
            target: 'd3',
            value: 8
        },
        {
            source: 'b2',
            target: 'e3',
            value: 5
        }, 
        {
            source: 'c2',
            target: 'a3',
            value: 5
        }, 
        {
            source: 'c2',
            target: 'b3',
            value: 5
        }, 
        {
            source: 'c2',
            target: 'c3',
            value: 5
        }, 
        {
            source: 'c2',
            target: 'd3',
            value: 5
        }, 
        {
            source: 'c2',
            target: 'e3',
            value: 5
        }, 
        {
            source: 'd2',
            target: 'a3',
            value: 5
        },
        {
            source: 'd2',
            target: 'b3',
            value: 5
        },
        {
            source: 'd2',
            target: 'c3',
            value: 5
        },
        {
            source: 'd2',
            target: 'd3',
            value: 5
        },
        {
            source: 'd2',
            target: 'e3',
            value: 5
        },
        {
            source: 'e2',
            target: 'a3',
            value: 5
        },
        {
            source: 'e2',
            target: 'b3',
            value: 5
        },
        {
            source: 'e2',
            target: 'c3',
            value: 5
        },
        {
            source: 'e2',
            target: 'd3',
            value: 5
        },
        {
            source: 'e2',
            target: 'e3',
            value: 5
        },
        
        // ---------------断层分界线
        
        {
            source: 'a3',
            target: 'a4',
            value: 5
        }, 
            {
            source: 'a3',
            target: 'b4',
            value: 5
        }, 
        {
            source: 'a3',
            target: 'c4',
            value: 5
        },
        {
            source: 'a3',
            target: 'd4',
            value: 5
        },
        {
            source: 'a3',
            target: 'e4',
            value: 3
        }, {
            source: 'b3',
            target: 'a4',
            value: 8
        },
        {
            source: 'b3',
            target: 'b4',
            value: 8
        },
        {
            source: 'b3',
            target: 'c4',
            value: 8
        },
        {
            source: 'b3',
            target: 'd4',
            value: 8
        },
        {
            source: 'b3',
            target: 'e4',
            value: 5
        }, 
        {
            source: 'c3',
            target: 'a4',
            value: 5
        }, 
        {
            source: 'c3',
            target: 'b4',
            value: 5
        }, 
        {
            source: 'c3',
            target: 'c4',
            value: 5
        }, 
        {
            source: 'c3',
            target: 'd4',
            value: 5
        }, 
        {
            source: 'c3',
            target: 'e4',
            value: 5
        }, 
        {
            source: 'd3',
            target: 'a4',
            value: 5
        },
        {
            source: 'd3',
            target: 'b4',
            value: 5
        },
        {
            source: 'd3',
            target: 'c4',
            value: 5
        },
        {
            source: 'd3',
            target: 'd4',
            value: 5
        },
        {
            source: 'd3',
            target: 'e4',
            value: 5
        },
        {
            source: 'e3',
            target: 'a4',
            value: 5
        },
        {
            source: 'e3',
            target: 'b4',
            value: 5
        },
        {
            source: 'e3',
            target: 'c4',
            value: 5
        },
        {
            source: 'e3',
            target: 'd4',
            value: 5
        },
        {
            source: 'e3',
            target: 'e4',
            value: 5
        },
        
        
         ]
    }
};


SankChart.setOption(option);
