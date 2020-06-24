import React from 'react';

function Navbar(props) {
	const word = React.createRef();
	const searchWord = () => {
		props.search(word.current.value.toLowerCase())
	}
	const enterPressed = (event) => {
		if (event.keyCode === 13) {
			event.preventDefault()
			searchWord()
		}
	}
	return (
		<nav className="navbar navbar-expand-lg navbar-light bg-light mb-3">
			<a className="navbar-brand" href="#" disabled>Search Here</a>
			<button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span className="navbar-toggler-icon"></span>
			</button>
			<div className="collapse navbar-collapse" id="navbarSupportedContent">
				<input className="form-control mr-sm-2" ref={word} type="search" placeholder="#Hiragana #Katakana #Romanji #English"
					aria-label="Search" onKeyUp={enterPressed} />
				<button className="btn btn-outline-success my-2 my-sm-0" onClick={searchWord}>Search</button>
			</div>
		</nav>
	)
}

const Definition = (props) => {
	const len = props.sense.english_definitions.length
	let str = ""
	props.sense.english_definitions.map((item, i) => {
		str += item
		if(i !== len - 1)
			str += ' , '
	})
	return (
		<li>
			<ol className="list-inline text-muted">
				{
					props.sense.parts_of_speech.map((part, i) => {
						return <li key={i.toString()} className="list-inline-item">[{part}]</li>
					})
				}
			</ol>
			<p className="font-weight-bold mb-2">{str}</p>
		</li>
	)
}

const DictionaryWord = (props) => {
	let main = props.data.japanese.filter((individual) => {
		return individual.word === props.data.slug
	})
	let url = 'https://jisho.org/word/' + props.data.slug 
	return (
		<div className="jumbotron py-0" style={{ backgroundColor: '#fff' }}>
			<h1 className="h1">{props.data.slug}</h1>
			<div className="row">
				<div className="col-3">
					<p className="lead font-weight-bold">
						Reading : <span className="text-decoration-none lead">
							{main[0] ? main[0].reading : 'None'}
						</span>
					</p>
				</div>
				<div className="col-3">
					<p className="lead font-weight-bold">
						Level : <span className="text-decoration-none lead">
							{props.data.jlpt.length > 0 ? props.data.jlpt[0] : 'None'}
						</span>
					</p>
				</div>
			</div>
			<p className="h4">English Translations</p>
			<ol>
			{
				props.data.senses.map((sense, index) => {
					return <Definition key={index.toString()} sense={sense} />
				})
			}
			</ol>
			<a className="btn btn-primary" href={url} role="button" target="_blank">Learn more</a>
			<hr className="my-4" />
		</div>
	)
}

class Dictionary extends React.Component {
	state = { ...this.props }

	static getDerivedStateFromProps(props, state) {
		if (props.isLoaded !== state.isLoaded) {
			return {
				words: [...props.words],
				isLoaded: props.isLoaded,
			}
		}
		return null
	}

	is_Executed = (() => {
		var executed = false
		return () => {
			if(!executed)
			{
				executed = true
				return false
			}
			return executed
		}
	})()

	render() {
		let body = (Array.isArray(this.state.words) && this.state.words.length) ?
				this.state.words.map((word) => {
				let keyStr = ""
				for (let i = 0; i < word.slug.length; i++) {
					keyStr += word.slug.charCodeAt(i).toString(16)
				}
				return (
					<DictionaryWord key={keyStr} data={word} />
				)
			}) : !this.is_Executed() ? <div className="alert alert-primary" role="alert">Results Will Show Here!</div> :
			<div className="alert alert-danger" role="alert">No word found</div>

		let loading = <div className="text-center">
			<div className="spinner-border" style={{ width: '3rem', height: '3rem' }} role="status">
				<span className="sr-only">Loading...</span>
			</div>
		</div>

		return (
			<div>
				<Navbar search={this.props.search} />
				{this.props.isLoaded ? body : loading}
			</div>
		)
	}
}

export default Dictionary;