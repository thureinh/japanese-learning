import React from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import Dictionary from './Dictionary';

class DictionaryHOC extends React.Component {
	state = {
		words: [],
		isLoaded: true
	}
	componentWillUnmount() {
		this.cancel()
	}
	searchWords = (word) => {
		const CancelToken = axios.CancelToken
		this.setState({words: [...this.state.words], isLoaded: false})
		axios.get(`https://cors-anywhere.herokuapp.com/http://beta.jisho.org/api/v1/search/words?keyword=${word}`,
		{
			headers: {'X-Requested-With': 'XMLHttpRequest'}
		},
		{
			cancelToken: new CancelToken((c) => {
				this.cancel = c;
			})
		}
		)
		.then((response) => {
			this.setState({ words: response.data.data.filter((word) =>  {
				for (let i = 0, n = word.slug.length; i < n; i++) {
					if (word.slug.charCodeAt( i ) > 255) return true
				}
				return false
			}), isLoaded: true});
		})
		.catch(function (error) {
			console.log(error);
		});
	}
	render() {
		return (
			<Dictionary words={this.state.words} isLoaded={this.state.isLoaded}  search={this.searchWords} />
		)
	}
}
export default DictionaryHOC;

if (document.getElementById('dictionary')) {
    ReactDOM.render(<DictionaryHOC />, document.getElementById('dictionary'));
}