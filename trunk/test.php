<?php
$data = "{
	ria: {
		path: '/ria/default/'
	},
	bg: {
		path: 'bg',
		list: [
			{name: '背景', file:'01.jpg'},
			{name: '背景', file:'02.jpg'},
			{name: '背景', file:'03.jpg'},
			{name: '背景', file:'04.jpg'},
			{name: '背景', file:'05.jpg'},
			{name: '背景', file:'06.jpg'},
			{name: '背景', file:'07.jpg'},
			{name: '背景', file:'08.jpg'},
			{name: '背景', file:'09.jpg'},
			{name: '背景', file:'10.jpg'},
			{name: '背景', file:'11.jpg'},
			{name: '背景', file:'12.jpg'},
			{name: '背景', file:'13.jpg'},
			{name: '背景', file:'15.jpg'},
			{name: '背景', file:'16.jpg'},
			{name: '背景', file:'17.jpg'},
			{name: '背景', file:'18.jpg'},
			{name: '背景', file:'19.jpg'},
			{name: '背景', file:'20.jpg'},
			{name: '背景', file:'21.jpg'},
			{name: '背景', file:'22.jpg'},
			{name: '背景', file:'23.jpg'},
			{name: '背景', file:'24.jpg'},
			{name: '背景', file:'25.jpg'},
			{name: '背景', file:'26.jpg'}
		]
	},
	tools: {
		path: 'tools',
		list: [
			{name: '文具', file:'01.gif'},
			{name: '文具', file:'02.gif'},
			{name: '文具', file:'03.gif'},
			{name: '文具', file:'04.gif'},
			{name: '文具', file:'05.gif'},
			{name: '文具', file:'06.gif'},
			{name: '文具', file:'07.gif'},
			{name: '文具', file:'08.gif'},
			{name: '文具', file:'09.gif'},
			{name: '文具', file:'10.gif'},
			{name: '文具', file:'11.gif'},
			{name: '文具', file:'12.gif'},
		]
	},
	flower: {
		path: 'flower',
		list: [
			{name: '文具', file:'01.gif'},
			{name: '文具', file:'02.gif'},
			{name: '文具', file:'03.gif'},
			{name: '文具', file:'04.gif'},
			{name: '文具', file:'05.gif'},
			{name: '文具', file:'06.gif'},
			{name: '文具', file:'07.gif'},
			{name: '文具', file:'08.gif'},
			{name: '文具', file:'09.gif'},
			{name: '文具', file:'10.gif'},
			{name: '文具', file:'11.gif'}
		]
	},
	talk: {
		path: 'talk',
		list: [
			{name: '文具', file:'01.gif'},
			{name: '文具', file:'02.gif'},
			{name: '文具', file:'03.gif'},
			{name: '文具', file:'04.gif'},
			{name: '文具', file:'05.gif'},
			{name: '文具', file:'06.gif'},
			{name: '文具', file:'07.gif'},
			{name: '文具', file:'08.gif'},
			{name: '文具', file:'09.gif'},
			{name: '文具', file:'10.gif'},
			{name: '文具', file:'11.gif'}
		]
	}
}";

dump(json_decode($data));