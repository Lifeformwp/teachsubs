import React, { Component } from 'react';
import Speech from 'react-speech';

class Panel extends Component {

    constructor(props) {
        super(props);
        this.state = {
            words: 'stop',
            origin: ''
        };
    }

    componentDidMount() {
        this.setState({
            words: '',
            origin: ''
        }, function () {
            this.translate();
        });
    }

    componentWillReceiveProps() {
        this.setState({
            words: '',
            origin: ''
        }, function () {
            this.translate();
        });
    }

    translate() {
        let transWords = this.props.nodes.toLowerCase();
        let FETCH_URL = `http://www.transltr.org/api/translate?text=${transWords}&to=ru`;
        console.log(FETCH_URL);


        fetch(FETCH_URL, {
            method: 'GET',
        })
            .then(response => response.json())
            .then(json => {
                const query = json['translationText'];
                const origin = json['from'];
                if (query == '') {
                    this.setState({words: 'Не удалось перевести текст'});
                } else {
                    this.setState({
                        words: query,
                        origin
                        });
                }
            });
    }

    render() {
        return (
            <div className="user-panel-translation-part" >
                    <p className="translated-text">Translation: <span className="translated-word">{this.state.words}</span></p>
                    <p className="translated-origin">Language: {this.state.origin}</p>
                    <Speech text={this.props.nodes} />
            </div>
        )
    }
}

export default Panel;