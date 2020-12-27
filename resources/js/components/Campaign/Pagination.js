import React, {Component} from 'react';

class Pagination extends Component {
    constructor(props) {
        super()
        this.state = {
            pagination: props.pagination,
            currentPage: props.currentPage
        }
    }

    componentWillRecieveProps(nextProps) {
        console.log('next props', nextProps)
        this.setState({
            pagination: nextProps.pagination,
            currentPage: nextProps.currentPage
        })
    }

    render() {
        return (
            <div className="col-md-12 mt-3">
                <nav aria-label="Page navigation example">
                    <ul className="pagination justify-content-center">
                        {
                            this.state.pagination.current_page_no > 1 &&
                            <li key='prev-page' className="page-item">
                                <a className="page-link"
                                   onClick={() => this.props.gotoPage('prev')}
                                   href="#">Previous</a>
                            </li>
                        }
                        {[...Array(this.state.pagination.last_page_no)].map((val, key) =>
                            <li key={key}
                                className={this.state.pagination.current_page_no == key + 1 ? 'page-item active' : 'page-item'}>
                                <a className="page-link" onClick={() => this.props.gotoPage(key)}
                                   href="#">{key + 1}</a>
                            </li>
                        )
                        }
                        {
                            this.state.pagination.last_page_no != this.state.pagination.current_page_no &&
                            <li key='next-page' className="page-item">
                                <a className="page-link"
                                   onClick={() => this.props.gotoPage('next')}
                                   href="#">Next</a>
                            </li>
                        }
                    </ul>
                </nav>
            </div>
        );
    }
}

export default Pagination;
